

@extends('layouts.customer')

@section('title', 'Akun Saya | SummitWirr')

@section('content')
<section class="container mx-auto py-10 px-4">

    <div class="bg-white rounded-2xl shadow-md p-8 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">

        {{-- ====================== SIDEBAR ====================== --}}
        <div class="col-span-1 border-r pr-6">

            {{-- Header Profil --}}
            <div class="flex flex-col items-center mb-10">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=80"
                     class="w-20 h-20 rounded-full shadow-sm mb-3">

                <h2 class="text-lg font-bold text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
            </div>

            {{-- Menu Sidebar --}}
            <nav class="space-y-4">

                {{-- Profil Saya (aktif) --}}
                <a href="{{ route('profile.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-100 text-blue-600 font-semibold">
                    <i class="fas fa-user text-lg"></i>
                    Profil Saya
                </a>

                {{-- Menu lain (belum ada route backendnya, sementara disabled dulu) --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 cursor-not-allowed">
                    <i class="far fa-clock text-lg"></i>
                    Pesanan Pending
                </div>

                <div class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 cursor-not-allowed">
                    <i class="fas fa-box-open text-lg"></i>
                    Sedang Disewa
                </div>

                <div class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 cursor-not-allowed">
                    <i class="fas fa-check-circle text-lg"></i>
                    Pesanan Selesai
                </div>

                <div class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 cursor-not-allowed">
                    <i class="fas fa-times-circle text-lg"></i>
                    Pesanan Dibatalkan/Gagal
                </div>

            </nav>

        </div>




        {{-- ====================== KONTEN KANAN ====================== --}}
        <div class="col-span-1 md:col-span-3">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">Profil Saya</h1>

            {{-- Grid Detail Profil --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-6">

                <div>
                    <p class="text-gray-400 text-sm">Nama</p>
                    <p class="font-semibold text-gray-800">{{ $user->name }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm">Email</p>
                    <p class="font-semibold text-gray-800">{{ $user->email }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm">No HP</p>
                    <p class="font-semibold text-gray-800">{{ $user->no_hp ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm">Password</p>
                    <p class="font-semibold text-gray-800">********</p>
                    <a href="{{ route('profile.edit') }}" class="text-blue-600 text-sm hover:underline">
                        Ganti Password?
                    </a>
                </div>

                {{-- KTP --}}
                <div>
                    <p class="text-gray-400 text-sm mb-1">KTP</p>

                    @if ($user->ktp_image)
                        <img src="{{ asset('storage/' . $user->ktp_image) }}"
                             class="w-40 rounded-xl border border-gray-200 shadow-sm">
                    @else
                        <p class="text-gray-400 italic">Belum mengunggah foto KTP</p>
                    @endif
                </div>

            </div>

            <div class="mt-10">
                <a href="{{ route('profile.edit') }}"
                   class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition">
                   Edit Profil
                </a>
            </div>

        </div>

    </div>

</section>
@endsection
