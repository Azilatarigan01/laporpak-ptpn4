<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class KepalaBagianController extends Controller
{
    public function list()
    {
        $query = User::where('user_type', 2)->where('is_delete', 0);

        try {
            if (Schema::hasColumn('users', 'urutan')) {
                $query->orderBy('urutan', 'asc')->orderBy('id', 'asc');
            } else {
                $query->orderBy('id', 'asc');
            }
        } catch (\Throwable $e) {
            $query->orderBy('id', 'asc');
        }

        $data['getRecord'] = $query->paginate(20);
        $data['header_title'] = "Manajemen Pimpinan & Kepala Bagian";
        return view('admin.kepalabagian.list', $data);
    }

    public function add()
    {
        $maxOrder = 1;
        try {
            if (Schema::hasColumn('users', 'urutan')) {
                $maxOrder = (int) User::where('user_type', 2)->where('is_delete', 0)->max('urutan') + 1;
            }
        } catch (\Throwable $e) {
            $maxOrder = 1;
        }

        $data['header_title'] = "Tambah Pimpinan / Kepala Bagian";
        $data['suggested_order'] = $maxOrder;
        return view('admin.kepalabagian.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'jabatan' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer|min:0',
            'deskripsi_jabatan' => 'nullable|string|max:500',
            'profil' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $fileName = '';
        if ($request->hasFile('profil')) {
            $file = $request->file('profil');
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            
            if (!file_exists(public_path('uploads/profiles'))) {
                mkdir(public_path('uploads/profiles'), 0777, true);
            }
            $file->move(public_path('uploads/profiles'), $fileName);
        }

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 2;
        $user->is_delete = 0;
        $user->profil = $fileName;

        if (Schema::hasColumn('users', 'jabatan')) {
            $user->jabatan = trim($request->jabatan ?? '');
        }

        if (Schema::hasColumn('users', 'urutan')) {
            if ($request->filled('urutan')) {
                $user->urutan = (int) $request->urutan;
            } else {
                $maxOrder = (int) User::where('user_type', 2)->where('is_delete', 0)->max('urutan');
                $user->urutan = $maxOrder + 1;
            }
        }

        if (Schema::hasColumn('users', 'deskripsi_jabatan')) {
            $user->deskripsi_jabatan = trim($request->deskripsi_jabatan ?? '');
        }

        $user->save();

        return redirect()->route('kepala.list')->with('success', 'Data Pimpinan/Kepala Bagian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $record = User::where('id', $id)->first();
        if ($record && ($record->user_type == 2 || $record->user_type == '2')) {
            $data['getRecord'] = $record;
            $data['header_title'] = "Edit Pimpinan / Kepala Bagian";
            return view('admin.kepalabagian.edit', $data);
        } else {
            return redirect()->route('kepala.list')->with('error', 'Data pimpinan tidak ditemukan.');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'jabatan' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer|min:0',
            'deskripsi_jabatan' => 'nullable|string|max:500',
            'profil' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profil')) {
            $file = $request->file('profil');
            if ($file->isValid()) {
                if (!empty($user->profil) && file_exists(public_path('uploads/profiles/' . $user->profil))) {
                    @unlink(public_path('uploads/profiles/' . $user->profil));
                }

                $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
                if (!file_exists(public_path('uploads/profiles'))) {
                    mkdir(public_path('uploads/profiles'), 0777, true);
                }
                $file->move(public_path('uploads/profiles'), $fileName);
                $user->profil = $fileName;
            }
        }

        if (Schema::hasColumn('users', 'jabatan')) {
            $user->jabatan = trim($request->jabatan ?? '');
        }

        if (Schema::hasColumn('users', 'urutan') && $request->filled('urutan')) {
            $user->urutan = (int) $request->urutan;
        }

        if (Schema::hasColumn('users', 'deskripsi_jabatan')) {
            $user->deskripsi_jabatan = trim($request->deskripsi_jabatan ?? '');
        }

        $user->save();

        return redirect()->route('kepala.list')->with('success', 'Data Pimpinan/Kepala Bagian berhasil diperbarui.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }

        if (!empty($user->profil) && file_exists(public_path('uploads/profiles/' . $user->profil))) {
            @unlink(public_path('uploads/profiles/' . $user->profil));
        }

        $user->delete();

        return redirect()->route('kepala.list')->with('success', 'Pimpinan/Kepala Bagian berhasil dihapus.');
    }

    /**
     * Reorder Pimpinan hierarchy dynamically via AJAX / Drag-and-Drop
     */
    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);

        if (empty($orders) && $request->isJson()) {
            $orders = $request->json()->all();
        }

        if (!empty($orders)) {
            DB::beginTransaction();
            try {
                foreach ($orders as $index => $item) {
                    $id = is_array($item) ? ($item['id'] ?? null) : $item;
                    $orderNum = is_array($item) ? ($item['urutan'] ?? ($index + 1)) : ($index + 1);

                    if ($id) {
                        User::where('id', $id)->where('user_type', 2)->update(['urutan' => (int) $orderNum]);
                    }
                }
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Urutan hierarki pimpinan berhasil diperbarui.']);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Gagal mengubah urutan: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['success' => false, 'message' => 'Data urutan tidak valid.'], 400);
    }

    /**
     * Move a leader up or down in hierarchy order with 1-click
     */
    public function move($id, $direction)
    {
        $current = User::where('id', $id)->where('user_type', 2)->firstOrFail();
        
        $pimpinans = User::where('user_type', 2)->where('is_delete', 0)->orderBy('urutan', 'asc')->orderBy('id', 'asc')->get();
        
        // Ensure all have a sequential urutan first
        foreach ($pimpinans as $idx => $p) {
            $p->urutan = $idx + 1;
            $p->save();
        }

        // Reload updated list
        $pimpinans = User::where('user_type', 2)->where('is_delete', 0)->orderBy('urutan', 'asc')->get();
        $currentIndex = $pimpinans->search(fn($item) => $item->id == $id);

        if ($currentIndex !== false) {
            if ($direction === 'up' && $currentIndex > 0) {
                $prev = $pimpinans[$currentIndex - 1];
                $temp = $current->urutan;
                $current->urutan = $prev->urutan;
                $prev->urutan = $temp;
                $current->save();
                $prev->save();
                return redirect()->route('kepala.list')->with('success', 'Urutan ' . $current->name . ' berhasil dinaikkan ke tingkat yang lebih tinggi.');
            } elseif ($direction === 'down' && $currentIndex < count($pimpinans) - 1) {
                $next = $pimpinans[$currentIndex + 1];
                $temp = $current->urutan;
                $current->urutan = $next->urutan;
                $next->urutan = $temp;
                $current->save();
                $next->save();
                return redirect()->route('kepala.list')->with('success', 'Urutan ' . $current->name . ' berhasil diturunkan.');
            }
        }

        return redirect()->route('kepala.list')->with('info', 'Posisi urutan pimpinan sudah berada di batas maksimal.');
    }
}
