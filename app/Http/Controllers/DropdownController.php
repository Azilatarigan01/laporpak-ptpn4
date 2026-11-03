<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Realisasi;
use App\Models\Posisi;
use App\Models\Karyawan;

class DropdownController extends Controller
{
    public function area()
    {
        $query = request('q');
        $data = Area::when($query, function($q) use ($query) {
            $q->where('nama_area', 'LIKE', '%' . $query . '%');
        })->get();

        $results = $data->map(function ($item) {
            return [
                'id' => $item->id_area ?? $item->id,
                'text' => $item->nama_area,
            ];
        });

        return response()->json([
            'results' => $results,
            'data' => $results, // for backward compatibility
        ]);
    }

    public function realisasi($id)
    {
        $query = request('q');
        $data = Realisasi::where('id_area', $id)
            ->when($query, function($q) use ($query) {
                $q->where('nama_realisasi', 'LIKE', '%' . $query . '%');
            })
            ->get();

        $results = $data->map(function ($item) {
            return [
                'id' => $item->id_realisasi,
                'text' => $item->nama_realisasi,
            ];
        });

        return response()->json([
            'results' => $results,
            'data' => $results,
        ]);
    }

    public function posisi($id)
    {
        $query = request('q');
        $data = Posisi::where('id_realisasi', $id)
            ->when($query, function($q) use ($query) {
                $q->where('nama_posisi', 'LIKE', '%' . $query . '%');
            })
            ->get();

        $results = $data->map(function ($item) {
            return [
                'id' => $item->id_posisi,
                'text' => $item->nama_posisi,
            ];
        });

        return response()->json([
            'results' => $results,
            'data' => $results,
        ]);
    }

    public function karyawan($id)
    {
        $query = request('q');
        $data = Karyawan::where('id_posisi', $id)
            ->when($query, function($q) use ($query) {
                $q->where('nama_karyawan', 'LIKE', '%' . $query . '%');
            })
            ->get();

        $results = $data->map(function ($item) {
            return [
                'id' => $item->id_karyawan,
                'text' => $item->nama_karyawan . ' (NIK: ' . $item->niksap . ')',
                'niksap' => $item->niksap,
            ];
        });

        return response()->json([
            'results' => $results,
            'data' => $results,
        ]);
    }

    public function niksap($id)
    {
        $data = Karyawan::where('id_karyawan', $id)->first();

        if ($data) {
            return response()->json([
                'id' => $data->id_karyawan,
                'text' => $data->niksap,
                'niksap' => $data->niksap,
                'nama' => $data->nama_karyawan,
            ]);
        }

        return response()->json(['id' => '', 'text' => '']);
    }

    public function areadropdown()
    {
        return $this->area();
    }

    public function realisasidropdown($id)
    {
        return $this->realisasi($id);
    }

    public function posisidropdown($id)
    {
        return $this->posisi($id);
    }

    /**
     * Verifikasi identitas karyawan via NIKSAP tanpa membocorkan direktori ke publik
     */
    public function cekNiksap(Request $request)
    {
        $niksap = trim($request->input('niksap', ''));

        if (empty($niksap)) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan masukkan nomor NIKSAP Anda.',
            ], 400);
        }

        $karyawan = Karyawan::with(['posisi.realisasi.area', 'posisi.area'])
            ->where('niksap', $niksap)
            ->first();

        if (!$karyawan) {
            return response()->json([
                'success' => false,
                'message' => 'NIKSAP tidak ditemukan dalam sistem. Mohon pastikan nomor NIKSAP sesuai dengan kartu pengenal karyawan PTPN IV.',
            ], 404);
        }

        // Tentukan Unit Kerja: KBN DOS (Kebun) vs PKS DOS (Pabrik Kelapa Sawit)
        $area = $karyawan->posisi?->area ?? $karyawan->posisi?->realisasi?->area;
        $areaId = $area?->id_area ?? ($karyawan->posisi?->id_area ?? 1);
        $namaAreaRaw = $area?->nama_area ?? 'KBN DOS';
        
        $unitLabel = ($namaAreaRaw === 'PKS DOS' || $areaId == 2) 
            ? 'PKS DOS (Pabrik Kelapa Sawit)' 
            : 'KBN DOS (Kebun Kelapa Sawit)';

        $realisasi = $karyawan->posisi?->realisasi;
        $realisasiId = $realisasi?->id_realisasi ?? ($karyawan->posisi?->id_realisasi ?? 1);
        $realisasiNama = $realisasi?->nama_realisasi ?? '-';

        $posisi = $karyawan->posisi;
        $posisiId = $posisi?->id_posisi ?? 1;
        $posisiNama = $posisi?->nama_posisi ?? '-';

        return response()->json([
            'success' => true,
            'message' => 'Data karyawan berhasil diverifikasi.',
            'data' => [
                'id_karyawan' => $karyawan->id_karyawan,
                'nama_karyawan' => $karyawan->nama_karyawan,
                'niksap' => $karyawan->niksap,
                'no_hp' => $karyawan->no_hp ?? '',
                'id_posisi' => $posisiId,
                'nama_posisi' => $posisiNama,
                'id_realisasi' => $realisasiId,
                'nama_realisasi' => $realisasiNama,
                'id_area' => $areaId,
                'nama_area' => $namaAreaRaw,
                'unit_label' => $unitLabel,
            ]
        ]);
    }
}