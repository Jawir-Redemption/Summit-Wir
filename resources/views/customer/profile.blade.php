@extends('layouts.customer')

@section('title', 'Akun Saya | SummitWirr')

@section('content')
    <section class="container mx-auto py-16 px-6">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                Akun Saya
            </h1>

            @if ($user)
                <div class="space-y-6">
                    {{-- Nama Lengkap --}}
                    <div>
                        <p class="text-gray-500 text-sm">Nama Lengkap</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $user->name }}</p>
                    </div>

                    {{-- Email --}}
                    <div>
                        <p class="text-gray-500 text-sm">Alamat Email</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $user->email }}</p>
                    </div>

                    {{-- Nomor HP --}}
                    <div>
                        <p class="text-gray-500 text-sm">Nomor HP</p>
                        <p class="text-lg font-semibold text-gray-800">
                            {{ $user->no_hp ? $user->no_hp : '-' }}
                        </p>
                    </div>

                    {{-- Foto KTP --}}
                    <div>
                        <p class="text-gray-500 text-sm mb-2">Foto KTP</p>
                        @if ($user->ktp_image)
                            <img src="{{ asset('storage/' . $user->ktp_image) }}" alt="Foto KTP {{ $user->name }}"
                                class="w-64 rounded-xl border border-gray-200 shadow-sm">
                        @else
                            <p class="text-gray-400 italic">Belum mengunggah foto KTP</p>
                        @endif
                    </div>

                    <hr class="my-6 border-gray-200">

                    {{-- Tombol Edit Profil --}}
                    <div class="pt-4 text-center">
                        <a href="{{ route('profile.edit') }}"
                            class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition">
                            Edit Profil
                        </a>
                    </div>
                </div>
            @else
                <div class="text-center text-gray-600">
                    <p>
                        Silakan <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">
                            login
                        </a> untuk melihat akun Anda.
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
