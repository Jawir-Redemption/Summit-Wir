@extends('layouts.customer')

@section('title', 'Edit Profil | SummitWirr')

@section('content')
    <section class="container mx-auto py-16 px-6">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                Edit Profil
            </h1>

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div>
                    <label for="name" class="block text-gray-600 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email (tidak bisa diubah) --}}
                <div>
                    <label for="email" class="block text-gray-600 font-medium mb-2">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" readonly
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-100 text-gray-500 cursor-not-allowed">
                    <p class="text-sm text-gray-400 mt-1">Email tidak dapat diubah.</p>
                </div>

                {{-- Password Lama --}}
                <div>
                    <label for="current_password" class="block text-gray-600 font-medium mb-2">Password Lama</label>
                    <input type="password" id="current_password" name="current_password"
                        placeholder="Masukkan password lama Anda"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                    @error('current_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Baru --}}
                <div>
                    <label for="password" class="block text-gray-600 font-medium mb-2">Password Baru (Opsional)</label>
                    <input type="password" id="password" name="password"
                        placeholder="Kosongkan jika tidak ingin mengubah password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-gray-600 font-medium mb-2">Konfirmasi Password
                        Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Ulangi password baru"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="pt-8 flex items-center justify-between">
                    <a href="{{ route('profile.index') }}" class="text-gray-500 hover:text-gray-700 transition font-medium">
                        ← Kembali ke Profil
                    </a>

                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
