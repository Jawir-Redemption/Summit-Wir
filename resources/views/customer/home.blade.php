@extends('layouts.customer')

@section('title', 'Beranda | SummitWirr')

@section('content')
  {{-- HERO SECTION --}}
  <section id="hero" class="relative bg-cover bg-center bg-no-repeat h-[80vh]" 
    style="background-image: url('{{ asset('assets/img/bg-tent.jpg') }}');">
    
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-6xl mx-auto h-full flex flex-col justify-center px-6 text-white">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
        Siap Naik Gunung? <br>
        Sewa Perlengkapan Outdoor Terbaik di <span class="text-blue-400">SummitWirr</span>
      </h1>

      <p class="text-lg md:text-xl mb-6 text-gray-200 max-w-2xl">
        Nikmati pengalaman mendaki dan berkemah tanpa repot membeli alat baru. 
        Cukup sewa, nikmati, dan jelajahi alam dengan mudah!
      </p>

      <div class="flex flex-wrap gap-4">
        {{-- Tombol ke semua produk --}}
        <a href="{{ route('customer.all-products') }}"
          class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-medium shadow-md transition">
          Lihat Semua Produk
        </a>

        {{-- Tombol ke panduan sewa --}}
        <a href="{{ route('customer.guide') }}"
          class="px-6 py-3 bg-transparent border border-white hover:bg-white hover:text-gray-900 rounded-lg font-medium transition">
          Cara Sewa
        </a>
      </div>
    </div>
  </section>

  {{-- SECTION: HIGHLIGHT PRODUK --}}
  <section id="highlight-products" class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-gray-800 mb-2">Produk Terpopuler</h2>
      <p class="text-gray-500 mb-10">Temukan perlengkapan outdoor terbaik pilihan para pendaki</p>

      {{-- Grid Produk --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($products as $product)
          <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition">
            <img src="{{ asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-48 object-cover">

            <div class="p-4 text-left">
              <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
              <p class="text-gray-500 text-sm mb-2">{{ $product->category->name ?? 'Umum' }}</p>
              <p class="text-blue-600 font-bold mb-3">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

              <div class="flex justify-between items-center">
                {{-- Detail produk --}}
                <a href="{{ route('customer.product-detail', ['id' => $product->id]) }}" 
                   class="text-sm text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-lg">
                   Lihat Detail
                </a>

                {{-- Tombol tambah ke keranjang --}}
                @auth
                <form action="{{ route('customer.cart.add', ['id' => $product->id]) }}" method="POST">
                  @csrf
                  <button type="submit" 
                          class="text-sm text-blue-600 border border-blue-600 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg transition">
                    + Keranjang
                  </button>
                </form>
                @endauth
              </div>
            </div>
          </div>
        @empty
          <p class="col-span-4 text-gray-500 italic">Belum ada produk yang tersedia.</p>
        @endforelse
      </div>

      {{-- Tombol ke semua produk --}}
      <div class="mt-12">
        <a href="{{ route('customer.all-products') }}" 
           class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-medium shadow-md transition">
          Lihat Semua Produk
        </a>
      </div>
    </div>
  </section>
@endsection
