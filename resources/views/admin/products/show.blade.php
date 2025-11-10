@extends('layouts.app')
@section('title', 'Detail Produk - Summit Wir')

@section('content')
    <div class="container px-6 mx-auto py-10">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-6">
            Detail Produk
        </h2>

        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-md p-8">
            {{-- Header --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-4 md:mb-0">
                    {{ $product->name }}
                </h1>
            </div>

            {{-- Gambar Produk --}}
            <div class="flex justify-center mb-6">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="rounded-lg shadow-md w-full md:w-1/2 object-cover">
                @else
                    <div
                        class="w-full md:w-1/2 h-64 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center text-gray-500 dark:text-gray-400">
                        Tidak ada gambar
                    </div>
                @endif
            </div>

            {{-- Informasi Produk --}}
            <div class="space-y-4 text-gray-700 dark:text-gray-300">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Kategori</p>
                    <p class="text-lg font-semibold">
                        {{ $product->category ? $product->category->category : 'Tidak ada kategori' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Deskripsi</p>
                    <p class="text-base">
                        {{ $product->description ?? 'Tidak ada deskripsi.' }}
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Harga</p>
                        <p class="text-lg font-semibold text-green-600 dark:text-green-400">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Stok</p>
                        <p class="text-lg font-semibold">{{ $product->stock }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Terjual</p>
                        <p class="text-lg font-semibold">{{ $product->sold }}</p>
                    </div>
                    <div class="mb-8">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                        <p class="text-lg font-semibold">
                            @if ($product->stock > 0)
                                <span class="text-green-600 dark:text-green-400">Tersedia</span>
                            @else
                                <span class="text-red-600 dark:text-red-400">Habis</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
