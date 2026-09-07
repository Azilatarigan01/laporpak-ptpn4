<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function list()
    {
        $karyawan = Karyawan::with(['posisi.realisasi.area'])->orderBy('id_karyawan', 'desc')->paginate(10);
        $totalKaryawan = Karyawan::count();

        return view('admin.karyawan.list', compact('karyawan', 'totalKaryawan'));
    }

    public function karyawanlist()
    {
        $karyawan = Karyawan::with(['posisi.realisasi.area'])->orderBy('id_karyawan', 'desc')->paginate(10);
        $totalKaryawan = Karyawan::count();

        return view('kepala.karyawan.list', compact('karyawan', 'totalKaryawan'));
    }

    public function add()
    {
        $data['header_title'] = "Add Karyawan";
        return view('admin.karyawan.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'niksap' => 'required|string|max:50',
        ]);

        $posisiId = $request->id_posisi ?? $request->nama_posisi;
        if (!$posisiId) {
            return back()->withInput()->with('error', 'Silakan pilih posisi/jabatan terlebih dahulu.');
        }

        $karyawan = new Karyawan();
        $karyawan->id_posisi = $posisiId;
        $karyawan->nama_karyawan = trim($request->nama_karyawan);
        $karyawan->niksap = trim($request->niksap);

        if ($karyawan->save()) {
            return redirect()->route('karyawan.list')->with('success', 'Data karyawan berhasil ditambahkan.');
        } else {
            return back()->withInput()->with('error', 'Gagal menambahkan karyawan.');
        }
    }

    public function edit($id)
    {
        $item = Karyawan::with('posisi.realisasi.area')->find($id);

        if (!$item) {
            return redirect()->route('karyawan.list')->with('error', 'Karyawan tidak ditemukan.');
        }

        return view('admin.karyawan.edit', compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'niksap' => 'required|string|max:50',
        ]);

        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return redirect()->route('karyawan.list')->with('error', 'Karyawan tidak ditemukan.');
        }

        $posisiId = $request->id_posisi ?? $request->nama_posisi ?? $karyawan->id_posisi;

        $karyawan->nama_karyawan = trim($request->nama_karyawan);
        $karyawan->id_posisi = $posisiId;
        $karyawan->niksap = trim($request->niksap);
        $karyawan->save();

        return redirect()->route('karyawan.list')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return redirect()->route('karyawan.list')->with('error', 'Karyawan tidak ditemukan.');
        }

        $karyawan->delete();

        return redirect()->route('karyawan.list')->with('success', 'Data karyawan berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $karyawan = Karyawan::with(['posisi.realisasi.area'])
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('nama_karyawan', 'LIKE', "%{$query}%")
                    ->orWhere('niksap', 'LIKE', "%{$query}%")
                    ->orWhereHas('posisi', function ($q) use ($query) {
                        $q->where('nama_posisi', 'LIKE', "%{$query}%")
                            ->orWhereHas('realisasi', function ($r) use ($query) {
                                $r->where('nama_realisasi', 'LIKE', "%{$query}%");
                            });
                    });
            })
            ->orderBy('id_karyawan', 'desc')
            ->paginate(10);

        $totalKaryawan = Karyawan::count();

        return view('admin.karyawan.list', compact('karyawan', 'query', 'totalKaryawan'));
    }
}