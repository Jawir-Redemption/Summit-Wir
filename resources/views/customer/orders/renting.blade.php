@extends('layouts.customer')

@section('title', 'Sedang Disewa | SummitWirr')

@section('content')
<section class="bg-gray-50 min-h-screen py-6 md:py-10">
    <div class="container mx-auto px-4 max-w-7xl">

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="flex flex-col md:flex-row">

                {{-- ====================== SIDEBAR KIRI ====================== --}}
                <div class="w-full md:w-64 lg:w-72 bg-white border-b md:border-b-0 md:border-r border-gray-200 p-6">
                    
                    {{-- Header User --}}
                    <div class="flex items-center gap-3 mb-8 pb-6 border-b border-gray-200">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&size=48" 
                             class="w-12 h-12 rounded-full flex-shrink-0">
                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-gray-900 truncate text-sm">{{ auth()->user()->name }}</h3>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    {{-- Menu Sidebar --}}
                    <nav class="space-y-1">
                        
                        {{-- Profil Saya --}}
                        <a href="{{ route('profile.index') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-user w-4 text-center"></i>
                            <span>Profil Saya</span>
                        </a>

                        {{-- Pesanan Pending --}}
                        <a href="{{ route('profile.orders.pending') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="far fa-clock w-4 text-center"></i>
                            <span>Pesanan Pending</span>
                        </a>

                        {{-- Sedang Disewa (Active) --}}
                        <a href="{{ route('profile.orders.renting') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm bg-blue-50 text-blue-600 font-medium transition">
                            <i class="fas fa-box-open w-4 text-center"></i>
                            <span>Sedang Disewa</span>
                        </a>

                        {{-- Pesanan Selesai --}}
                        <a href="{{ route('profile.orders.completed') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-check-circle w-4 text-center"></i>
                            <span>Pesanan Selesai</span>
                        </a>

                        {{-- Pesanan Dibatalkan/Gagal --}}
                        <a href="{{ route('profile.orders.cancelled') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-times-circle w-4 text-center"></i>
                            <span>Pesanan Dibatalkan/Gagal</span>
                        </a>

                    </nav>

                </div>

                {{-- ====================== KONTEN KANAN ====================== --}}
                <div class="flex-1 p-6 md:p-8 lg:p-10">

                    <h1 class="text-xl md:text-2xl font-bold text-gray-900 mb-6">Sedang Disewa</h1>

                    {{-- Jika tidak ada pesanan --}}
                    @if($orders->isEmpty())
                        <div class="text-center py-16">
                            <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg mb-4">Tidak ada pesanan sedang disewa</p>
                            <a href="{{ route('products') }}" 
                               class="inline-block px-6 py-2.5 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                                Mulai Menyewa
                            </a>
                        </div>
                    @else
                        {{-- List Pesanan --}}
                        <div class="space-y-4">
                            @foreach($orders as $order)
                                <div class="bg-white border border-gray-200 rounded-xl p-5 hover:shadow-md transition">
                                    
                                    {{-- Header --}}
                                    <div class="flex flex-wrap items-start justify-between gap-3 mb-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs text-gray-500 mb-1">Order ID : ORD{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</p>
                                            <h3 class="font-bold text-gray-900 text-base md:text-lg break-words">
                                                @if($order->orderDetails->count() == 1)
                                                    {{ $order->orderDetails->first()->product->name ?? 'Produk' }}
                                                @else
                                                    {{ $order->orderDetails->first()->product->name ?? 'Produk' }} + {{ $order->orderDetails->count() - 1 }} item lainnya
                                                @endif
                                            </h3>
                                        </div>
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded whitespace-nowrap">
                                            Disewa
                                        </span>
                                    </div>

                                    {{-- Detail Grid 3 Kolom --}}
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4 text-sm">
                                        <div>
                                            <p class="text-gray-500 text-xs mb-1">Mulai Sewa</p>
                                            <p class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($order->loan_date)->format('d M Y') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-xs mb-1">Durasi</p>
                                            <p class="font-semibold text-gray-900">{{ $order->duration }} hari</p>
                                        </div>
                                        <div class="col-span-2 md:col-span-1">
                                            <p class="text-gray-500 text-xs mb-1">Tanggal Kembali</p>
                                            <p class="font-semibold text-red-600">{{ \Carbon\Carbon::parse($order->return_date)->format('d M Y') }}</p>
                                        </div>
                                    </div>

                                    {{-- Total --}}
                                    <div class="mb-4">
                                        <p class="text-xl md:text-2xl font-bold text-gray-900">
                                            Rp. {{ number_format($order->total_price, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    {{-- Tombol --}}
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <button class="flex-1 px-5 py-2.5 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition">
                                            Konfirmasi Pembalian
                                        </button>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        @if($orders->hasPages())
                            <div class="mt-6">
                                {{ $orders->links() }}
                            </div>
                        @endif
                    @endif

                </div>

            </div>
        </div>

    </div>
</section>
@endsection