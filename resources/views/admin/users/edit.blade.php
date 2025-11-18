@extends('layouts.app')
@section('title', 'Edit Pengguna - Summit Wir')

@section('content')
    <div class="container px-6 mx-auto py-10">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-6">
            Edit Pengguna
        </h2>

        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-8 text-center">
                Formulir Edit Pengguna
            </h1>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div>
                    <label class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full border rounded-lg px-4 py-2 dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-purple-500 focus:outline-none"
                        required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border rounded-lg px-4 py-2 dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-purple-500 focus:outline-none"
                        required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nomor HP --}}
                <div>
                    <label class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Nomor HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                        class="w-full border rounded-lg px-4 py-2 dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-purple-500 focus:outline-none">
                    @error('no_hp')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Ganti Password (opsional) --}}
                <div>
                    <label class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Password Baru (opsional)</label>
                    <input type="password" name="password"
                        class="w-full border rounded-lg px-4 py-2 dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-purple-500 focus:outline-none">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Upload KTP --}}
                <div>
                    <label class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Upload KTP (opsional)</label>
                    <input type="file" name="ktp_image" accept="image/*"
                        class="w-full border rounded-lg px-4 py-2 dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-purple-500 focus:outline-none">
                    @if ($user->ktp_image)
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">KTP saat ini:</p>
                        <img src="{{ asset('storage/' . $user->ktp_image) }}" alt="KTP {{ $user->name }}"
                            class="w-64 h-40 object-cover rounded-lg border mt-2">
                    @endif
                    @error('ktp_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="pt-6 flex justify-between items-center">
                    <button type="submit"
                        class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg shadow-md font-medium transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
