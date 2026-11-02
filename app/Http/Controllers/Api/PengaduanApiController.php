<?php

namespace App\Http\Controllers\Api;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PengaduanApiController extends BaseApiController
{
    /**
     * Get paginated list of complaints with search & filters
     * GET /api/v1/pengaduan
     */
    public function index(Request $request): JsonResponse
    {
        $query = Pengaduan::with(['area', 'realisasi', 'kategori_pengaduan', 'karyawan']);

        // Filter status: Diterima, Diproses, Selesai, Ditolak
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter kategori
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // Search by kode_pengaduan or deskripsi
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_pengaduan', 'LIKE', "%{$search}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$search}%");
            });
        }

        $perPage = min((int) ($request->get('limit', 10)), 50);
        $pengaduan = $query->orderBy('tgl_pengaduan', 'desc')->paginate($perPage);

        // Format data to protect anonymous whistleblower identities
        $pengaduan->getCollection()->transform(function ($item) {
            return $this->formatPengaduan($item);
        });

        return $this->sendResponse([
            'items' => $pengaduan->items(),
            'pagination' => [
                'current_page' => $pengaduan->currentPage(),
                'per_page' => $pengaduan->perPage(),
                'total' => $pengaduan->total(),
                'last_page' => $pengaduan->lastPage(),
            ]
        ], 'Daftar pengaduan berhasil diambil');
    }

    /**
     * Get summary metrics & statistics for dashboard
     * GET /api/v1/pengaduan/stats
     */
    public function stats(): JsonResponse
    {
        $total = Pengaduan::count();
        $diterima = Pengaduan::where('status', 'Diterima')->count();
        $diproses = Pengaduan::where('status', 'Diproses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();

        // Hitung pengaduan diterima yang sudah lewat target SLA 3 hari kerja
        $overdueCount = Pengaduan::where('status', 'Diterima')
            ->get()
            ->filter(fn($p) => $p->isOverdue())
            ->count();

        return $this->sendResponse([
            'total_pengaduan' => $total,
            'diterima' => $diterima,
            'diproses' => $diproses,
            'selesai' => $selesai,
            'overdue_sla' => $overdueCount,
        ], 'Statistik pengaduan berhasil diambil');
    }

    /**
     * Get detail of a specific complaint by ticket code
     * GET /api/v1/pengaduan/{kode_pengaduan}
     */
    public function show(string $kode_pengaduan): JsonResponse
    {
        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])
            ->where('kode_pengaduan', $kode_pengaduan)
            ->orWhere('id_pengaduan', $kode_pengaduan)
            ->first();

        if (!$pengaduan) {
            return $this->sendError('Pengaduan dengan nomor tiket tersebut tidak ditemukan', [], 404);
        }

        $data = $this->formatPengaduan($pengaduan, true);

        return $this->sendResponse($data, 'Detail pengaduan berhasil ditemukan');
    }

    /**
     * Submit a new complaint via REST API
     * POST /api/v1/pengaduan
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id_area' => 'required',
            'id_realisasi' => 'required',
            'id_posisi' => 'required',
            'id_karyawan' => 'required',
            'niksap' => 'required|string',
            'no_hp' => 'required|string|max:25',
            'deskripsi' => 'required|string|min:10',
            'kategori_id' => 'nullable',
            'is_anonim' => 'nullable|boolean',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'deskripsi.min' => 'Uraian pengaduan minimal 10 karakter.',
            'foto.image' => 'File foto harus berupa gambar valid.',
            'foto.max' => 'Ukuran file foto maksimal 2MB.',
            'lampiran.max' => 'Ukuran lampiran dokumen maksimal 2MB.',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validasi input gagal', $validator->errors()->toArray(), 422);
        }

        $pengaduan = new Pengaduan();
        $pengaduan->id_area = $request->id_area;
        $pengaduan->id_realisasi = $request->id_realisasi;
        $pengaduan->id_posisi = $request->id_posisi;
        $pengaduan->id_karyawan = $request->id_karyawan;
        $pengaduan->niksap = $request->niksap;
        $pengaduan->no_hp = trim($request->no_hp);
        $pengaduan->deskripsi = trim($request->deskripsi);
        $pengaduan->kategori_id = $request->kategori_id ?: null;
        $pengaduan->status = 'Diterima';
        $pengaduan->balasan = '';
        $pengaduan->kode_pengaduan = 'PD' . Carbon::now('Asia/Jakarta')->format('ymd') . '-' . rand(1000, 9999);
        $pengaduan->tgl_pengaduan = Carbon::now('Asia/Jakarta');
        $pengaduan->is_anonim = $request->boolean('is_anonim');

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_api_foto_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $destination = public_path('uploads/foto');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }
            $file->move($destination, $fileName);
            $pengaduan->foto = 'uploads/foto/' . $fileName;
        } else {
            $pengaduan->foto = '';
        }

        // Handle upload lampiran dokumen
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = time() . '_api_lampiran_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $destination = public_path('uploads/lampiran');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }
            $file->move($destination, $fileName);
            $pengaduan->lampiran = 'uploads/lampiran/' . $fileName;
        } else {
            $pengaduan->lampiran = '';
        }

        $pengaduan->save();

        // Dispatch notifikasi Telegram otomatis
        $this->kirimNotifikasiTelegram($pengaduan);

        return $this->sendResponse([
            'kode_pengaduan' => $pengaduan->kode_pengaduan,
            'status' => $pengaduan->status,
            'tgl_pengaduan' => $pengaduan->tgl_pengaduan->format('Y-m-d H:i:s'),
            'tracking_url' => url('/pengaduan/cek-status?kode=' . $pengaduan->kode_pengaduan),
        ], 'Laporan pengaduan berhasil dibuat', 201);
    }

    /**
     * Submit rating & feedback for resolved complaint
     * POST /api/v1/pengaduan/{kode_pengaduan}/rating
     */
    public function submitRating(Request $request, string $kode_pengaduan): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'feedback_pelapor' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validasi rating gagal', $validator->errors()->toArray(), 422);
        }

        $pengaduan = Pengaduan::where('kode_pengaduan', $kode_pengaduan)
            ->orWhere('id_pengaduan', $kode_pengaduan)
            ->first();

        if (!$pengaduan) {
            return $this->sendError('Pengaduan tidak ditemukan', [], 404);
        }

        $pengaduan->rating = (int) $request->rating;
        $pengaduan->feedback_pelapor = $request->feedback_pelapor ? trim($request->feedback_pelapor) : null;
        $pengaduan->save();

        return $this->sendResponse([
            'kode_pengaduan' => $pengaduan->kode_pengaduan,
            'rating' => $pengaduan->rating,
            'feedback_pelapor' => $pengaduan->feedback_pelapor,
        ], 'Terima kasih, ulasan kepuasan berhasil disimpan');
    }

    /**
     * Helper to format pengaduan data with privacy & SLA metrics
     */
    private function formatPengaduan(Pengaduan $p, bool $includeDetails = false): array
    {
        $slaDueDate = $p->sla_due_date ? Carbon::parse($p->sla_due_date)->format('Y-m-d H:i') : null;

        $data = [
            'id' => $p->id_pengaduan,
            'kode_pengaduan' => $p->kode_pengaduan,
            'tgl_pengaduan' => $p->tgl_pengaduan ? $p->tgl_pengaduan->format('Y-m-d H:i:s') : null,
            'status' => $p->status,
            'kategori' => $p->kategori_pengaduan->nama_kategori ?? 'Umum',
            'is_anonim' => (bool) $p->is_anonim,
            'nama_pelapor' => $p->is_anonim ? 'Karyawan (Anonim)' : ($p->karyawan->nama_karyawan ?? 'Karyawan'),
            'area' => $p->area->nama_area ?? '-',
            'realisasi' => $p->realisasi->nama_realisasi ?? '-',
            'is_overdue' => $p->isOverdue(),
            'sla_due_date' => $slaDueDate,
            'hari_kerja_berlalu' => $p->hari_kerja_berlalu,
            'rating' => $p->rating,
        ];

        if ($includeDetails) {
            $data['niksap'] = $p->is_anonim ? 'DIRAHASIAKAN (WBS)' : $p->niksap;
            $data['no_hp'] = $p->is_anonim ? 'DIRAHASIAKAN (WBS)' : $p->no_hp;
            $data['posisi'] = $p->posisi->nama_posisi ?? '-';
            $data['deskripsi'] = $p->deskripsi;
            $data['balasan'] = $p->balasan ?? '-';
            $data['petugas_nama'] = $p->petugas_nama ?? null;
            $data['tgl_tanggapan'] = $p->tgl_tanggapan ? Carbon::parse($p->tgl_tanggapan)->format('Y-m-d H:i:s') : null;
            $data['feedback_pelapor'] = $p->feedback_pelapor ?? null;
            $data['foto_url'] = $p->foto ? url($p->foto) : null;
            $data['lampiran_url'] = $p->lampiran ? url($p->lampiran) : null;
        }

        return $data;
    }

    /**
     * Dispatch notification to Telegram Bot
     */
    private function kirimNotifikasiTelegram(Pengaduan $pengaduan): void
    {
        try {
            $token = env('TELEGRAM_BOT_TOKEN');
            $chatId = env('TELEGRAM_CHAT_ID');

            if (!empty($token) && !empty($chatId)) {
                $pengaduan->loadMissing(['karyawan', 'area', 'realisasi', 'kategori_pengaduan']);

                $nama = $pengaduan->is_anonim ? '🔒 [DIRAHASIAKAN (WBS)]' : ($pengaduan->karyawan->nama_karyawan ?? 'Karyawan');
                $kategori = $pengaduan->kategori_pengaduan->nama_kategori ?? 'Umum';
                $tgl = Carbon::parse($pengaduan->tgl_pengaduan)->format('d-m-Y H:i') . ' WIB';

                $pesan = "📢 *PENGADUAN BARU (VIA REST API)*\n\n"
                    . "Kode Tiket: `{$pengaduan->kode_pengaduan}`\n"
                    . "Kategori: {$kategori}\n"
                    . "Pelapor: {$nama}\n"
                    . "Waktu: {$tgl}\n\n"
                    . "Uraian: " . substr($pengaduan->deskripsi, 0, 150) . "...\n\n"
                    . "🌐 Cek di sistem: " . url('/pengaduan/cek-status?kode=' . $pengaduan->kode_pengaduan);

                Http::timeout(5)->post("https://api.telegram.org/bot{$token}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $pesan,
                    'parse_mode' => 'Markdown',
                ]);
            }
        } catch (\Throwable $e) {
            Log::warning('Gagal kirim notifikasi Telegram dari API: ' . $e->getMessage());
        }
    }
}

