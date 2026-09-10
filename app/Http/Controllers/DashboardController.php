<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Karyawan;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        if (!$user || !in_array($user->user_type, [1, 2])) {
            abort(403, 'Unauthorized access.');
        }

        $filter = $request->query('filter', 'all');
        $search = trim($request->query('search', ''));
        
        $pengaduanQuery = Pengaduan::with(['area', 'realisasi', 'posisi', 'karyawan', 'kategori_pengaduan']);

        // Terapkan filter tanggal
        switch ($filter) {
            case 'today':
                $pengaduanQuery->whereDate('tgl_pengaduan', now()->toDateString());
                break;
            case 'this_week':
                $pengaduanQuery->whereBetween('tgl_pengaduan', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'this_month':
                $pengaduanQuery->whereMonth('tgl_pengaduan', now()->month)->whereYear('tgl_pengaduan', now()->year);
                break;
            case 'all':
            default:
                break;
        }

        // Filter pencarian dengan grouping yang benar
        if (!empty($search)) {
            $pengaduanQuery->where(function ($q) use ($search) {
                $q->where('kode_pengaduan', 'LIKE', "%{$search}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$search}%")
                  ->orWhereHas('karyawan', function ($k) use ($search) {
                      $k->where('nama_karyawan', 'LIKE', "%{$search}%")
                        ->orWhere('niksap', 'LIKE', "%{$search}%");
                  })
                  ->orWhereHas('posisi', function ($p) use ($search) {
                      $p->where('nama_posisi', 'LIKE', "%{$search}%");
                  });
            });
        }

        // Statistik Status
        $statusDiterima = Pengaduan::where('status', 'Diterima')->count();
        $statusDalamProses = Pengaduan::where('status', 'Dalam Proses')->count();
        $statusSelesai = Pengaduan::where('status', 'Selesai')->count();
        $totalPengaduan = Pengaduan::count();

        $persenDiterima = $totalPengaduan ? round(($statusDiterima / $totalPengaduan) * 100, 1) : 0;
        $persenDalamProses = $totalPengaduan ? round(($statusDalamProses / $totalPengaduan) * 100, 1) : 0;
        $persenSelesai = $totalPengaduan ? round(($statusSelesai / $totalPengaduan) * 100, 1) : 0;

        // Data statistik tambahan
        $totalKaryawan = Karyawan::count();
        $totalNews = News::count();
        $totalPimpinan = User::where('user_type', 2)->where('is_delete', 0)->count();

        // Data tren bulanan tahun berjalan (Januari - Desember)
        $currentYear = now()->year;
        $monthlyCounts = array_fill(1, 12, 0);
        $monthlySelesaiCounts = array_fill(1, 12, 0);

        try {
            $monthData = Pengaduan::selectRaw('MONTH(tgl_pengaduan) as bln, COUNT(*) as total, SUM(CASE WHEN status = "Selesai" THEN 1 ELSE 0 END) as total_selesai')
                ->whereYear('tgl_pengaduan', $currentYear)
                ->groupBy('bln')
                ->get();

            foreach ($monthData as $m) {
                $monthlyCounts[(int) $m->bln] = (int) $m->total;
                $monthlySelesaiCounts[(int) $m->bln] = (int) $m->total_selesai;
            }
        } catch (\Throwable $e) {}

        $monthlyLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $monthlyValues = array_values($monthlyCounts);
        $monthlySelesaiValues = array_values($monthlySelesaiCounts);

        // Data Distribusi per Afdeling (Realisasi)
        $afdelingLabels = [];
        $afdelingValues = [];
        try {
            $afdelingStats = Pengaduan::join('realisasi', 'pengaduan.id_realisasi', '=', 'realisasi.id_realisasi')
                ->selectRaw('realisasi.nama_realisasi, COUNT(*) as count')
                ->groupBy('realisasi.nama_realisasi')
                ->orderBy('count', 'desc')
                ->limit(8)
                ->get();

            foreach ($afdelingStats as $a) {
                $afdelingLabels[] = $a->nama_realisasi;
                $afdelingValues[] = (int) $a->count;
            }
        } catch (\Throwable $e) {}

        if (empty($afdelingLabels)) {
            $afdelingLabels = ['Afdeling I', 'Afdeling II', 'Afdeling III', 'Tata Usaha'];
            $afdelingValues = [0, 0, 0, 0];
        }

        // Data Distribusi per Kategori
        $kategoriLabels = [];
        $kategoriValues = [];
        try {
            $kategoriStats = Pengaduan::join('kategori_pengaduan', 'pengaduan.kategori_id', '=', 'kategori_pengaduan.id')
                ->selectRaw('kategori_pengaduan.nama_kategori, COUNT(*) as count')
                ->groupBy('kategori_pengaduan.nama_kategori')
                ->orderBy('count', 'desc')
                ->get();

            foreach ($kategoriStats as $k) {
                $kategoriLabels[] = $k->nama_kategori;
                $kategoriValues[] = (int) $k->count;
            }
        } catch (\Throwable $e) {}

        if (empty($kategoriLabels)) {
            $kategoriLabels = ['Fasilitas', 'Operasional Lapangan', 'K3', 'Lainnya'];
            $kategoriValues = [0, 0, 0, 0];
        }

        $pengaduan = $pengaduanQuery->orderBy('tgl_pengaduan', 'desc')->paginate(10);

        $view = $user->user_type == 1 ? 'admin.dashboard' : 'kepala.dashboard';

        return view($view, compact(
            'pengaduan',
            'filter',
            'search',
            'totalKaryawan',
            'totalNews',
            'totalPimpinan',
            'totalPengaduan',
            'statusDiterima',
            'statusDalamProses',
            'statusSelesai',
            'persenDiterima',
            'persenDalamProses',
            'persenSelesai',
            'monthlyLabels',
            'monthlyValues',
            'monthlySelesaiValues',
            'afdelingLabels',
            'afdelingValues',
            'kategoriLabels',
            'kategoriValues',
            'currentYear'
        ));
    }
}
