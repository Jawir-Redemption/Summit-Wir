@extends('layouts.customer')

@section('title', 'Semua Produk | SummitWirr')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-4">Semua Produk</h1>
        <p class="text-gray-600 mb-6">Filter / sorting akan ditambahkan di sini. Saat ini menampilkan data dari variabel
            <code>$products</code> jika tersedia.
        </p>

        {{-- Grid Produk --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-48 object-cover">

                    <div class="p-4 text-left">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm mb-2">{{ $product->category->category ?? 'Umum' }}</p>
                        <p class="text-blue-600 font-bold mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                        <div class="flex justify-between items-center">
                            {{-- Detail produk --}}
                            <a href="{{ route('product.detail', $product->id) }}"
                                class="text-sm text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-lg">
                                Lihat Detail
                            </a>

                            {{-- Tombol tambah ke keranjang --}}
                            <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="text-sm text-blue-600 border border-blue-600 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg transition">
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

    </section>
@endsection
