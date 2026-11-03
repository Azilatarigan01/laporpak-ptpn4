<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use App\Models\Karyawan;
use App\Models\KategoriPengaduan;
use Illuminate\Http\JsonResponse;

class MasterDataApiController extends BaseApiController
{
    /**
     * Get all complaint categories
     * GET /api/v1/master/kategori
     */
    public function kategori(): JsonResponse
    {
        $kategori = KategoriPengaduan::select('id', 'nama_kategori')->get();
        return $this->sendResponse($kategori, 'Daftar kategori pengaduan berhasil diambil');
    }

    /**
     * Get all work areas with sub-units (realisasi)
     * GET /api/v1/master/areas
     */
    public function areas(): JsonResponse
    {
        $areas = Area::with(['realisasi:id_realisasi,id_area,nama_realisasi'])
            ->select('id_area', 'nama_area')
            ->get();
            
        return $this->sendResponse($areas, 'Daftar area kerja berhasil diambil');
    }

    /**
     * Verifikasi identitas karyawan & posisi unit berdasarkan NIKSAP
     * GET /api/v1/master/cek-niksap/{niksap}
     */
    public function cekNiksap(string $niksap): JsonResponse
    {
        $karyawan = Karyawan::with(['posisi.realisasi.area'])
            ->where('niksap', $niksap)
            ->first();

        if (!$karyawan) {
            return $this->sendError('NIKSAP tidak ditemukan dalam sistem karyawan PTPN IV', [], 404);
        }

        $posisi = $karyawan->posisi;
        $realisasi = $posisi ? $posisi->realisasi : null;
        $area = $realisasi ? $realisasi->area : ($posisi ? $posisi->area : null);

        $idArea = $area ? $area->id_area : ($realisasi ? $realisasi->id_area : null);
        $unitLabel = ($idArea == 1) 
            ? 'KBN DOS (Kebun Kelapa Sawit)' 
            : (($idArea == 2) ? 'PKS DOS (Pabrik Kelapa Sawit)' : ($area->nama_area ?? 'Unit Dolok Sinumbah'));

        return $this->sendResponse([
            'niksap' => $karyawan->niksap,
            'nama_karyawan' => $karyawan->nama_karyawan,
            'unit_label' => $unitLabel,
            'id_area' => $idArea,
            'nama_area' => $area ? $area->nama_area : '-',
            'id_realisasi' => $realisasi ? $realisasi->id_realisasi : null,
            'nama_realisasi' => $realisasi ? $realisasi->nama_realisasi : '-',
            'id_posisi' => $posisi ? $posisi->id_posisi : null,
            'nama_posisi' => $posisi ? $posisi->nama_posisi : '-',
            'id_karyawan' => $karyawan->id_karyawan,
        ], 'Data karyawan berhasil diverifikasi');
    }
}

