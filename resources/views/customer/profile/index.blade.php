@extends('layouts.customer')

@section('title', 'Profil Saya | SummitWirr')

@section('content')
<section class="bg-gray-50 min-h-screen py-6 md:py-10">
    <div class="container mx-auto px-4 max-w-7xl">

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="flex flex-col md:flex-row">

                {{-- ====================== SIDEBAR KIRI ====================== --}}
                <div class="w-full md:w-64 lg:w-72 bg-white border-b md:border-b-0 md:border-r border-gray-200 p-6">

                    {{-- Header User (SAMA seperti halaman Pending) --}}
                    <div class="flex items-center gap-3 mb-8 pb-6 border-b border-gray-200">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&size=48" 
                             class="w-12 h-12 rounded-full flex-shrink-0">
                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-gray-900 truncate text-sm">{{ auth()->user()->name }}</h3>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    {{-- Sidebar Menu --}}
                    <nav class="space-y-1">

                        {{-- Profil Saya (active) --}}
                        <a href="{{ route('profile.index') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm bg-blue-50 text-blue-600 font-medium transition">
                            <i class="fas fa-user w-4 text-center"></i>
                            <span>Profil Saya</span>
                        </a>

                        {{-- Pesanan Pending --}}
                        <a href="{{ route('profile.orders.pending') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="far fa-clock w-4 text-center"></i>
                            <span>Pesanan Pending</span>
                        </a>

                        {{-- Sedang Disewa --}}
                        <a href="{{ route('profile.orders.renting') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-box-open w-4 text-center"></i>
                            <span>Sedang Disewa</span>
                        </a>

                        {{-- Pesanan Selesai --}}
                        <a href="{{ route('profile.orders.completed') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-check-circle w-4 text-center"></i>
                            <span>Pesanan Selesai</span>
                        </a>

                        {{-- Pesanan Dibatalkan --}}
                        <a href="{{ route('profile.orders.cancelled') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-times-circle w-4 text-center"></i>
                            <span>Pesanan Dibatalkan/Gagal</span>
                        </a>

                    </nav>

                </div>

                {{-- ====================== KONTEN KANAN ====================== --}}
                <div class="flex-1 p-6 md:p-8 lg:p-10">

                    <h1 class="text-xl md:text-2xl font-bold text-gray-900 mb-8">Profil Saya</h1>

                    {{-- Grid Detail Profil --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6 mb-8">

                        {{-- Nama --}}
                        <div>
                            <p class="text-sm text-gray-500 mb-2">Nama</p>
                            <p class="text-base font-semibold text-gray-900">{{ $user->name }}</p>
                        </div>

                        {{-- Email --}}
                        <div>
                            <p class="text-sm text-gray-500 mb-2">Email</p>
                            <p class="text-base font-semibold text-gray-900 break-all">{{ $user->email }}</p>
                        </div>

                        {{-- Nomor HP --}}
                        <div>
                            <p class="text-sm text-gray-500 mb-2">No HP</p>
                            <p class="text-base font-semibold text-gray-900">{{ $user->no_hp ?? '-' }}</p>
                        </div>

                        {{-- Password --}}
                        <div>
                            <p class="text-sm text-gray-500 mb-2">Password</p>
                            <p class="text-base font-semibold text-gray-900 mb-1">********</p>
                            <a href="{{ route('profile.edit') }}" class="text-sm text-blue-600 hover:underline">
                                Ganti Password?
                            </a>
                        </div>

                        {{-- KTP --}}
                        <div class="col-span-1 md:col-span-2">
                            <p class="text-sm text-gray-500 mb-2">KTP</p>
                            @if ($user->ktp_image)
                                <img src="{{ asset('storage/' . $user->ktp_image) }}"
                                     class="w-full max-w-xs rounded-lg border border-gray-200 shadow-sm">
                            @else
                                <p class="text-base italic text-gray-400">Belum mengunggah foto KTP</p>
                            @endif
                        </div>

                    </div>

                    {{-- Tombol Edit Profil --}}
                    <div class="mt-8">
                        <a href="{{ route('profile.edit') }}"
                           class="inline-block px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
                           Edit Profil
                        </a>
                        
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection
