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

        // Data tren mingguan
        $mingguanData = [
            'Senin' => 0,
            'Selasa' => 0,
            'Rabu' => 0,
            'Kamis' => 0,
            'Jumat' => 0,
            'Sabtu' => 0,
            'Minggu' => 0
        ];

        try {
            $mingguan = Pengaduan::selectRaw('DAYOFWEEK(tgl_pengaduan) as day_of_week, COUNT(*) as count')
                ->where('tgl_pengaduan', '>=', now()->subDays(30))
                ->groupBy('day_of_week')
                ->get();

            $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            foreach ($mingguan as $data) {
                if (isset($days[$data->day_of_week - 1])) {
                    $dayName = $days[$data->day_of_week - 1];
                    $mingguanData[$dayName] = (int) $data->count;
                }
            }
        } catch (\Throwable $e) {
            // fallback default
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
            'mingguanData'
        ));
    }
}
