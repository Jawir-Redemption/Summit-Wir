<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function index()
    {
        $user = Auth::user();
        return view('customer.profile', compact('user'));
    }

    /**
     * Menampilkan halaman edit profil.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('customer.edit-profile', compact('user'));
    }

    /**
     * Memperbarui profil pengguna.
     */

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'ktp_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'current_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update password jika diisi
        if (!empty($validated['current_password']) && !empty($validated['password'])) {
            if (password_verify($validated['current_password'], $user->password)) {
                $user->password = bcrypt($validated['password']);
            } else {
                return back()
                    ->withErrors(['current_password' => 'Password lama tidak sesuai.'])
                    ->withInput();
            }
        }

        // Upload foto KTP (1 file per user)
        if ($request->hasFile('ktp_image')) {
            // Tentukan nama file sesuai ID user
            $extension = $request->file('ktp_image')->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension; // contoh: 5.jpg

            // Hapus foto lama jika ada
            if ($user->ktp_image && Storage::disk('public')->exists($user->ktp_image)) {
                Storage::disk('public')->delete($user->ktp_image);
            }

            // Simpan dengan nama file sesuai ID user
            $path = $request->file('ktp_image')->storeAs('ktp', $filename, 'public');
            $user->ktp_image = $path;
        }

        // Update data lain
        $user->name = $validated['name'];
        $user->no_hp = $validated['no_hp'] ?? $user->no_hp;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
