<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::where('user_type', 1)->where('is_delete', 0)->orderBy('id', 'desc')->paginate(10);
        $data['header_title'] = "Daftar Administrator";
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Tambah Admin Baru";
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'jabatan' => 'nullable|string|max:255',
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
        $user->jabatan = trim($request->jabatan ?? 'Staf Bagian Personalia');
        $user->user_type = 1;
        $user->is_delete = 0;
        $user->profil = $fileName;
        $user->save();

        return redirect()->route('admin.list')->with('success', 'Akun Petugas/Personalia berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord']) && $data['getRecord']->user_type == 1) {
            $data['header_title'] = "Edit Akun Petugas";
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'jabatan' => 'nullable|string|max:255',
            'profil' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->jabatan = trim($request->jabatan ?? ($user->jabatan ?: 'Staf Bagian Personalia'));

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

        $user->save();

        return redirect()->route('admin.list')->with('success', 'Data Akun Petugas/Personalia berhasil diperbarui.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }

        if ($user->id == Auth::id()) {
            return redirect()->route('admin.list')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        if (!empty($user->profil) && file_exists(public_path('uploads/profiles/' . $user->profil))) {
            @unlink(public_path('uploads/profiles/' . $user->profil));
        }

        $user->delete();

        return redirect()->route('admin.list')->with('success', 'Akun Admin berhasil dihapus.');
    }
}
