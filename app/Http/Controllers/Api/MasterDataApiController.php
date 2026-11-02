<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
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
}

