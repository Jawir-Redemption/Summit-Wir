@extends('layouts.app')
@section('title', 'Detail Pengguna - Summit Wir')

@section('content')
    <div class="container px-6 mx-auto py-10">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-6">
            Detail Pengguna
        </h2>

        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-8 text-center">
                Informasi Akun
            </h1>

            <div class="space-y-6">
                {{-- Foto KTP --}}
                <div class="flex flex-col items-center mb-6">
                    @if ($user->ktp_image)
                        <img src="{{ asset('storage/' . $user->ktp_image) }}" alt="KTP {{ $user->name }}"
                            class="w-64 h-40 object-cover rounded-lg border border-gray-300 dark:border-gray-700 shadow-sm">
                    @else
                        <div
                            class="w-64 h-40 flex items-center justify-center bg-gray-100 dark:bg-gray-700 text-gray-500 rounded-lg">
                            Tidak ada foto KTP
                        </div>
                    @endif
                </div>

                {{-- Nama --}}
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Nama Lengkap</p>
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $user->name }}</p>
                </div>

                {{-- Email --}}
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Alamat Email</p>
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $user->email }}</p>
                </div>

                {{-- Nomor HP --}}
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Nomor HP</p>
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $user->no_hp ?? '-' }}</p>
                </div>

                {{-- Tanggal Bergabung --}}
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Tanggal Bergabung</p>
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        {{ $user->created_at->format('d M Y, H:i') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
