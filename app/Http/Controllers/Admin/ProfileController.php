<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Halaman profil admin
     */
    public function index()
    {
        return view('admin.profile.index', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update profil
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update($validated);

        return back()->with(
            'success',
            'Profil berhasil diperbarui.'
        );
    }

    /**
     * Halaman ubah password
     */
    public function editPassword()
    {
        return view('admin.profile.password', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'current_password.current_password' =>
                'Password lama yang Anda masukkan salah.',

            'password.min' =>
                'Password baru minimal 8 karakter.',

            'password.confirmed' =>
                'Konfirmasi password tidak cocok.',
        ]);

        $user = auth()->user();

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with(
            'success',
            'Password berhasil diubah.'
        );
    }
}