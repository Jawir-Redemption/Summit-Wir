<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search') && $request->search != '') {
            $users = User::where('name', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%")
                ->orderByDesc('name')
                ->paginate(10)
                ->withQueryString();
        } else {
            $users = User::orderByDesc('name')->paginate(10)->withQueryString();
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8',
            'ktp_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ganti password jika diisi
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Upload KTP baru jika ada
        if ($request->hasFile('ktp_photo')) {
            $file = $request->file('ktp_photo');
            $filename = 'ktp_' . $user->id . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/ktp', $filename);
            $validated['ktp_photo'] = 'ktp/' . $filename;
        }

        $user->update($validated);

        return redirect()->route('admin.users.show', $user->id)->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
