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
}