@extends('layouts.customer')

@section('title', 'Semua Produk | SummitWirr')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-4">Semua Produk</h1>

        {{-- Filter kategori --}}
        <form action="{{ route('products') }}" method="GET"
            class="mb-8 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0">
            <div>
                <label for="category" class="block text-gray-700 font-medium mb-1">Apa yang kamu cari?</label>
                <select name="category" id="category" onchange="this.form.submit()"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-64 focus:ring-2 focus:ring-green-500 ">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->category }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

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

    </section>
@endsection
