<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\Realisasi;
use App\Models\Area;
use App\Models\Posisi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PengaduanController extends Controller
{
    public function list()
    {
        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])
            ->orderBy('tgl_pengaduan', 'desc')
            ->paginate(10);

        return view('admin.pengaduan.list', compact('pengaduan'));
    }

    public function add()
    {
        $kategori = KategoriPengaduan::all();
        $areas = Area::all();
        return view('admin.pengaduan.add', compact('kategori', 'areas'));
    }

    public function beranda()
    {
        $kategori = KategoriPengaduan::all();
        return view('pengaduan.beranda', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_area' => 'required',
            'nama_realisasi' => 'required',
            'nama_posisi' => 'required',
            'nama_karyawan' => 'required',
            'niksap' => 'required',
            'no_hp' => 'required|string|max:25',
            'deskripsi' => 'required|string',
            'kategori_id' => 'nullable',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'lampiran.mimes' => 'Lampiran harus berupa file dengan format jpg, jpeg, png, atau pdf.',
            'lampiran.max' => 'Ukuran lampiran terlalu besar. Maksimal 2MB.',
            'foto.mimes' => 'Foto harus berupa file dengan format jpg, jpeg, png, atau webp.',
            'foto.max' => 'Ukuran foto terlalu besar. Maksimal 2MB.',
        ]);

        $pengaduan = new Pengaduan();
        $pengaduan->id_area = $request->nama_area;
        $pengaduan->id_realisasi = $request->nama_realisasi;
        $pengaduan->id_posisi = $request->nama_posisi;
        $pengaduan->id_karyawan = $request->nama_karyawan;
        $pengaduan->niksap = $request->niksap;
        $pengaduan->no_hp = trim($request->no_hp);
        $pengaduan->deskripsi = trim($request->deskripsi);
        $pengaduan->kategori_id = $request->kategori_id ?: null;
        $pengaduan->status = 'Diterima';
        $pengaduan->balasan = '';
        $pengaduan->kode_pengaduan = 'PD' . Carbon::now('Asia/Jakarta')->format('ymd') . '-' . rand(1000, 9999);
        $pengaduan->tgl_pengaduan = Carbon::now('Asia/Jakarta');

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = time() . '_lampiran_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            if (!file_exists(public_path('uploads/lampiran'))) {
                mkdir(public_path('uploads/lampiran'), 0777, true);
            }
            $file->move(public_path('uploads/lampiran'), $fileName);
            $pengaduan->lampiran = 'uploads/lampiran/' . $fileName;
        } else {
            $pengaduan->lampiran = '';
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_foto_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            if (!file_exists(public_path('uploads/foto'))) {
                mkdir(public_path('uploads/foto'), 0777, true);
            }
            $file->move(public_path('uploads/foto'), $fileName);
            $pengaduan->foto = 'uploads/foto/' . $fileName;
        } else {
            $pengaduan->foto = '';
        }

        $pengaduan->save();

        // Dispatch Notifikasi Otomatis ke Telegram Bot Personalia / Admin
        $this->kirimNotifikasiOtomatis($pengaduan);

        return redirect('/pengaduan')->with('success', 'Laporan pengaduan Anda berhasil dikirim! Silakan simpan kode pengaduan Anda: ' . $pengaduan->kode_pengaduan . ' untuk memantau status tindak lanjut.');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama_area' => 'required',
            'nama_realisasi' => 'required',
            'nama_posisi' => 'required',
            'nama_karyawan' => 'required',
            'niksap' => 'required',
            'no_hp' => 'required|string|max:25',
            'deskripsi' => 'required|string',
            'kategori_id' => 'nullable',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $pengaduan = new Pengaduan();
        $pengaduan->id_area = $request->nama_area;
        $pengaduan->id_realisasi = $request->nama_realisasi;
        $pengaduan->id_posisi = $request->nama_posisi;
        $pengaduan->id_karyawan = $request->nama_karyawan;
        $pengaduan->niksap = $request->niksap;
        $pengaduan->no_hp = trim($request->no_hp);
        $pengaduan->deskripsi = trim($request->deskripsi);
        $pengaduan->kategori_id = $request->kategori_id ?: null;
        $pengaduan->status = 'Diterima';
        $pengaduan->balasan = '';
        $pengaduan->kode_pengaduan = 'PD' . \Carbon\Carbon::now('Asia/Jakarta')->format('ymd') . '-' . rand(1000, 9999);
        $pengaduan->tgl_pengaduan = \Carbon\Carbon::now('Asia/Jakarta');

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = time() . '_lampiran_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            if (!file_exists(public_path('uploads/lampiran'))) {
                mkdir(public_path('uploads/lampiran'), 0777, true);
            }
            $file->move(public_path('uploads/lampiran'), $fileName);
            $pengaduan->lampiran = 'uploads/lampiran/' . $fileName;
        } else {
            $pengaduan->lampiran = '';
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_foto_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            if (!file_exists(public_path('uploads/foto'))) {
                mkdir(public_path('uploads/foto'), 0777, true);
            }
            $file->move(public_path('uploads/foto'), $fileName);
            $pengaduan->foto = 'uploads/foto/' . $fileName;
        } else {
            $pengaduan->foto = '';
        }

        $pengaduan->save();

        // Dispatch Notifikasi Otomatis ke Telegram Bot Personalia / Admin
        $this->kirimNotifikasiOtomatis($pengaduan);

        return redirect()->route('pengaduan.list')->with('success', 'Data pengaduan baru berhasil diinput manual oleh Admin dengan kode: ' . $pengaduan->kode_pengaduan);
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        if (!empty($pengaduan->lampiran) && file_exists(public_path($pengaduan->lampiran))) {
            @unlink(public_path($pengaduan->lampiran));
        }
        if (!empty($pengaduan->foto) && file_exists(public_path($pengaduan->foto))) {
            @unlink(public_path($pengaduan->foto));
        }

        $pengaduan->delete();

        return redirect()->back()->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function cekStatus(Request $request)
    {
        if ($request->isMethod('get') && !$request->filled('kode')) {
            return view('pengaduan.cek-status');
        }

        $request->validate([
            'kode' => 'required',
        ]);

        $query = trim((string)$request->kode);

        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])
            ->where('kode_pengaduan', $query)
            ->orWhere('niksap', $query)
            ->orderBy('id_pengaduan', 'desc')
            ->first();

        if ($pengaduan) {
            return view('pengaduan.status', ['pengaduan' => $pengaduan]);
        } else {
            return redirect()->route('pengaduan.cek-status')->withInput()->with('error', 'Kode pengaduan atau NIKSAP "' . e($request->kode) . '" tidak ditemukan. Pastikan data yang dimasukkan sudah sesuai.');
        }
    }

    public function updateStatus(Request $request, $id = null)
    {
        $request->validate([
            'status' => 'required|string',
            'balasan' => 'nullable|string'
        ]);

        $targetId = $id ?? $request->id_pengaduan;
        $pengaduan = Pengaduan::find($targetId);

        if (!$pengaduan && $request->filled('id_pengaduan')) {
            $pengaduan = Pengaduan::find($request->id_pengaduan);
        }

        if ($pengaduan) {
            $pengaduan->status = $request->status;
            $pengaduan->balasan = $request->balasan;
            $pengaduan->save();

            return redirect()->back()->with('success', 'Status dan respon tindak lanjut pengaduan (' . $pengaduan->kode_pengaduan . ') berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Data pengaduan tidak ditemukan.');
    }

    public function search(Request $request)
    {
        $query = trim($request->input('q'));

        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where(function ($q) use ($query) {
                    $q->where('kode_pengaduan', 'LIKE', "%{$query}%")
                      ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                      ->orWhere('no_hp', 'LIKE', "%{$query}%")
                      ->orWhereHas('karyawan', function ($k) use ($query) {
                          $k->where('nama_karyawan', 'LIKE', "%{$query}%")
                            ->orWhere('niksap', 'LIKE', "%{$query}%");
                      })
                      ->orWhereHas('posisi', function ($p) use ($query) {
                          $p->where('nama_posisi', 'LIKE', "%{$query}%");
                      })
                      ->orWhereHas('area', function ($a) use ($query) {
                          $a->where('nama_area', 'LIKE', "%{$query}%");
                      });
                });
            })
            ->orderBy('tgl_pengaduan', 'desc')
            ->paginate(10);

        return view('admin.pengaduan.list', compact('pengaduan', 'query'));
    }

    public function filterByStatus($status)
    {
        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])
            ->where('status', $status)
            ->orderBy('tgl_pengaduan', 'desc')
            ->paginate(10);

        return view('admin.pengaduan.list', compact('pengaduan', 'status'));
    }

    public function filterByRealisasi($id_realisasi)
    {
        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])
            ->where('id_realisasi', $id_realisasi)
            ->orderBy('tgl_pengaduan', 'desc')
            ->paginate(10);
            
        $realisasi = Realisasi::find($id_realisasi);

        return view('admin.pengaduan.list', compact('pengaduan', 'realisasi'));
    }

    public function pengaduanlist()
    {
        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])
            ->orderBy('tgl_pengaduan', 'desc')
            ->paginate(10);

        return view('kepala.pengaduan.list', compact('pengaduan'));
    }

    /**
     * Cetak Lembar Pengaduan PDF Resmi
     */
    public function cetakPdf($id)
    {
        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])
            ->where('id_pengaduan', $id)
            ->firstOrFail();

        try {
            $pdf = Pdf::loadView('admin.pengaduan.cetak-pdf', compact('pengaduan'))
                      ->setPaper('a4', 'portrait');
            return $pdf->stream('Pengaduan-' . $pengaduan->kode_pengaduan . '.pdf');
        } catch (\Throwable $e) {
            // Fallback rendering HTML preview directly with print prompt if PDF renderer encounters an environment error
            return view('admin.pengaduan.cetak-pdf', compact('pengaduan'));
        }
    }

    /**
     * Halaman Rekapitulasi & Laporan Eksekutif Pengaduan
     */
    public function rekapLaporan(Request $request)
    {
        $kategoriList = KategoriPengaduan::all();
        $realisasiList = Realisasi::all();

        $query = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan']);

        if ($request->filled('start_date')) {
            $query->whereDate('tgl_pengaduan', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('tgl_pengaduan', '<=', $request->end_date);
        }
        if ($request->filled('id_realisasi')) {
            $query->where('id_realisasi', $request->id_realisasi);
        }
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $allRecords = (clone $query)->get();
        $pengaduan = $query->orderBy('tgl_pengaduan', 'desc')->paginate(15);

        // Summary Stats
        $stats = [
            'total' => $allRecords->count(),
            'diterima' => $allRecords->where('status', 'Diterima')->count(),
            'proses' => $allRecords->where('status', 'Dalam Proses')->count(),
            'selesai' => $allRecords->where('status', 'Selesai')->count(),
        ];

        return view('admin.pengaduan.rekap', compact('pengaduan', 'kategoriList', 'realisasiList', 'stats'));
    }

    /**
     * Export Rekapitulasi Laporan ke Excel (.csv kompatibel MS Excel)
     */
    public function exportExcel(Request $request)
    {
        $query = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan']);

        if ($request->filled('start_date')) {
            $query->whereDate('tgl_pengaduan', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('tgl_pengaduan', '<=', $request->end_date);
        }
        if ($request->filled('id_realisasi')) {
            $query->where('id_realisasi', $request->id_realisasi);
        }
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $records = $query->orderBy('tgl_pengaduan', 'desc')->get();

        $fileName = 'Rekap_Pengaduan_PTPN4_DOS_' . Carbon::now()->format('Ymd_His') . '.csv';

        $headers = [
            "Content-type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = [
            'No',
            'Kode Pengaduan',
            'Waktu Masuk',
            'NIKSAP',
            'Nama Karyawan',
            'Area Kerja',
            'Bagian / Afdeling',
            'Jabatan',
            'Nomor HP',
            'Kategori Pengaduan',
            'Uraian Masalah / Aspirasi',
            'Status Penanganan',
            'Catatan Tanggapan Pimpinan'
        ];

        $callback = function () use ($records, $columns) {
            $file = fopen('php://output', 'w');
            // Write UTF-8 BOM for Microsoft Excel compatibility
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($file, $columns, ';');

            foreach ($records as $index => $row) {
                fputcsv($file, [
                    $index + 1,
                    $row->kode_pengaduan,
                    $row->tgl_pengaduan ? Carbon::parse($row->tgl_pengaduan)->format('d/m/Y H:i') : '-',
                    "'" . $row->niksap,
                    $row->karyawan->nama_karyawan ?? 'Karyawan',
                    $row->area->nama_area ?? '-',
                    $row->realisasi->nama_realisasi ?? '-',
                    $row->posisi->nama_posisi ?? '-',
                    $row->no_hp ?? '-',
                    $row->kategori_pengaduan->nama_kategori ?? 'Umum',
                    str_replace(["\r", "\n"], ' ', $row->deskripsi),
                    $row->status,
                    str_replace(["\r", "\n"], ' ', $row->balasan ?? '-')
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Export Rekapitulasi Laporan ke PDF Laporan Eksekutif Direksi
     */
    public function exportPdf(Request $request)
    {
        $query = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan']);

        if ($request->filled('start_date')) {
            $query->whereDate('tgl_pengaduan', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('tgl_pengaduan', '<=', $request->end_date);
        }
        if ($request->filled('id_realisasi')) {
            $query->where('id_realisasi', $request->id_realisasi);
        }
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $records = $query->orderBy('tgl_pengaduan', 'desc')->get();
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        try {
            $pdf = Pdf::loadView('admin.pengaduan.rekap-pdf', compact('records', 'startDate', 'endDate'))
                      ->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan_Rekapitulasi_Pengaduan_PTPN4.pdf');
        } catch (\Throwable $e) {
            return view('admin.pengaduan.rekap-pdf', compact('records', 'startDate', 'endDate'));
        }
    }

    /**
     * Cetak Lembar Disposisi Tindak Lanjut Lapangan
     */
    public function cetakDisposisi($id)
    {
        $pengaduan = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan'])->findOrFail($id);
        return view('admin.pengaduan.cetak-disposisi', compact('pengaduan'));
    }

    /**
     * Kirim notifikasi otomatis ke Telegram Bot Grup Personalia / Admin & WA jika disetting
     */
    private function kirimNotifikasiOtomatis($pengaduan)
    {
        try {
            $token = env('TELEGRAM_BOT_TOKEN');
            $chatId = env('TELEGRAM_CHAT_ID');

            if (!empty($token) && !empty($chatId)) {
                $pengaduan->loadMissing(['karyawan', 'area', 'realisasi', 'kategori_pengaduan']);
                
                $namaPelapor = $pengaduan->karyawan->nama_karyawan ?? 'Karyawan';
                $afdeling = $pengaduan->realisasi->nama_realisasi ?? ($pengaduan->area->nama_area ?? '-');
                $kategori = $pengaduan->kategori_pengaduan->nama_kategori ?? 'Umum / Fasilitas';
                $tgl = Carbon::parse($pengaduan->tgl_pengaduan)->translatedFormat('d M Y, H:i') . ' WIB';
                $link = url('/pengaduan/cek-status?kode=' . $pengaduan->kode_pengaduan);
                
                $text = "📢 *PENGADUAN BARU MASUK!* 📢\n";
                $text .= "🏢 *PTPN IV Regional II Kebun Dolok Sinumbah*\n";
                $text .= "━━━━━━━━━━━━━━━━━━━━\n";
                $text .= "🎫 *Kode Tiket:* `{$pengaduan->kode_pengaduan}`\n";
                $text .= "👤 *Pelapor:* {$namaPelapor} (NIKSAP: {$pengaduan->niksap})\n";
                $text .= "📍 *Afdeling/Unit:* {$afdeling}\n";
                $text .= "🏷 *Kategori:* {$kategori}\n";
                $text .= "📅 *Waktu:* {$tgl}\n";
                $text .= "📞 *Kontak Pelapor:* {$pengaduan->no_hp}\n";
                $text .= "━━━━━━━━━━━━━━━━━━━━\n";
                $text .= "📝 *Uraian Pengaduan:*\n" . mb_substr($pengaduan->deskripsi, 0, 300) . (mb_strlen($pengaduan->deskripsi) > 300 ? '...' : '') . "\n\n";
                $text .= "🔗 *Buka Lembar Laporan:*\n{$link}";

                Http::timeout(5)->withoutVerifying()->post("https://api.telegram.org/bot{$token}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $text,
                    'parse_mode' => 'Markdown',
                ]);
            }
        } catch (\Throwable $e) {
            Log::warning('Telegram Notification Dispatch Error: ' . $e->getMessage());
        }
    }
}
