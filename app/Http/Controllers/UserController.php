<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show account form based on user type
    public function showMyAccountForm()
    {
        $user = Auth::user();

        if ($user->user_type == 1) {
            return view('admin.my_account', compact('user'));
        } elseif ($user->user_type == 2) {
            return view('kepala.my_account', compact('user'));
        }

        return redirect()->back()->with('error', 'Tipe pengguna tidak dikenali.');
    }

    // Update account information for Admin
    public function updateAdminAccount(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profil' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $this->updateUser($user, $request);

        return redirect()->back()->with('success', 'Profil Administrator berhasil diperbarui.');
    }

    // Update account information for Kepala
    public function updateKepalaAccount(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profil' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $this->updateUser($user, $request);

        return redirect()->back()->with('success', 'Profil Kepala Bagian / Pimpinan berhasil diperbarui.');
    }

    private function updateUser(User $user, Request $request)
    {
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if ($request->hasFile('profil')) {
            $file = $request->file('profil');
            if ($file->isValid()) {
                if (!empty($user->profil) && file_exists(public_path('uploads/profiles/' . $user->profil))) {
                    @unlink(public_path('uploads/profiles/' . $user->profil));
                }

                $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
                if (!file_exists(public_path('uploads/profiles'))) {
                    mkdir(public_path('uploads/profiles'), 0777, true);
                }
                $file->move(public_path('uploads/profiles'), $filename);
                $user->profil = $filename;
            }
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
    }
}
