@extends('layouts.customer')

@section('title', 'Beranda | SummitWirr')

@section('content')
    {{-- HERO SECTION --}}
    <section id="hero" 
    class="relative bg-cover bg-center bg-no-repeat h-[80vh] -mt-[80px]"
    style="background-image: url('{{ asset('assets/img/bg-tent.jpg') }}');">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-6xl mx-auto h-full flex flex-col justify-center px-6 text-white pt-[80px]">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
            Siap Naik Gunung? <br>
            Sewa Perlengkapan Outdoor Terbaik di 
            <span class="text-green-400">SummitWir</span>
        </h1>

        <p class="text-lg md:text-xl mb-6 text-gray-200 max-w-2xl">
            Nikmati pengalaman mendaki dan berkemah tanpa repot membeli alat baru.
            Cukup sewa, nikmati, dan jelajahi alam dengan mudah!
        </p>

        <div class="flex flex-wrap gap-4">

                {{-- Tombol ke panduan sewa --}}
                <a href="{{ route('guide') }}"
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
                        <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group"
                            onclick="window.location.href='{{ route('product.detail', $product->id) }}'">
                            <div class="overflow-hidden">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>

                            <div class="p-4 text-left">
                                <h3 class="text-lg font-semibold text-gray-800 truncate group-hover:text-green-600 transition-colors duration-300">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-gray-500 text-sm mb-2">{{ $product->category->category ?? 'Umum' }}</p>
                                <p class="text-black-600 font-bold mb-1 group-hover:scale-105 inline-block transition-transform duration-300">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                {{-- Stok Produk --}}
                                @if ($product->stock > 0)
                                    <p class="text-sm text-black-600 font-medium mb-3">
                                        Stok: {{ $product->stock }}
                                    </p>
                                @else
                                    <p class="text-sm text-red-600 font-medium mb-3">
                                        Stok Habis
                                    </p>
                                @endif

                                <div class="flex justify-end items-center">
                                    
                                {{-- Tombol tambah ke keranjang --}}
                                    <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST"
                                        onclick="event.stopPropagation()">
                                        @csrf
                                        <button type="submit"
                                            class="text-sm text-gray-600 border border-black-600 hover:bg-green-600 hover:text-white hover:scale-105 px-3 py-1.5 rounded-lg transition-all duration-300 transform active:scale-95">
                                            + Keranjang
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-4 text-gray-500 italic">Belum ada produk yang tersedia.</p>
                    @endforelse
                </div>

            {{-- Tombol ke semua produk --}}
            <div class="mt-12">
                <a href="{{ route('products') }}"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-medium shadow-md transition">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>
   
     <!-- MAP SECTION -->
    <section class="w-full px-10 py-20 bg-white">
        <div class="max-w-6xl mx-auto text-center">
    
                <h2 class="text-4xl font-semibold text-gray-900 mb-4">
                    Lokasi Kami
                </h2>

                <p class="text-gray-600 text-base mb-10 max-w-2xl leading-relaxed text-center mx-auto">
                    Jl. Jend. Wito No.38, RT.2/RW.2, Brato, Kec. Boloktotono,
                    Kota Saranjana, Jawa Selatan 12150
                </p>

                <!-- MAP -->
                <div class="w-full max-w-5xl h-[460px] mx-auto rounded-2xl overflow-hidden shadow-lg border">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6013.879258367039!2d109.25366701884879!3d-7.435860572927334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1762736551342!5m2!1sid!2sid"
                        class="w-full h-full border-0"
                        allowfullscreen>
                    </iframe>
                </div>

                <a href="https://maps.app.goo.gl/qs2u7yhFtp7wfFF57"
                target="_blank"
                class="mt-6 text-sm font-medium text-blue-600 hover:text-blue-700">
                    Lihat di Google Maps →
                </a>
            </div>
        </div>
    </section>

    </div>
    </section>

@endsection
