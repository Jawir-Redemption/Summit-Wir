@extends('layouts.customer')

@section('title', isset($product) ? $product->name : 'Detail Produk')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-10">
        {{-- Tombol kembali --}}
        <a href="{{ route('products') }}" class="text-sm text-blue-600 hover:underline flex items-center mb-6">
            <span class="mr-1 text-lg">&larr;</span> Kembali ke Semua Produk
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            {{-- Kolom Gambar Produk --}}
            <div class="lg:col-span-2">
                <div class="bg-white shadow rounded-2xl p-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-[400px] object-contain rounded-lg mx-auto">
                </div>

                {{-- Deskripsi Produk --}}
                <div class="bg-white mt-8 shadow rounded-2xl p-6">
                    <h2 class="text-xl font-bold mb-2">Deskripsi</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $product->description ?? 'Deskripsi produk belum tersedia.' }}</p>
                </div>
            </div>

            {{-- Kolom Harga & Rekomendasi --}}
            <div class="space-y-6">
                {{-- Harga dan Booking --}}
                <div class="bg-white shadow rounded-2xl p-6">
                    <h3 class="text-sm text-gray-500">Harga sewa</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-4">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div>
                            <label class="block text-sm mb-1">Jumlah</label>
                            <input type="number" name="qty" value="1" min="1"
                                class="w-24 border rounded px-2 py-1">
                        </div>

                        <div>
                            <label class="block text-sm mb-1">Durasi (hari)</label>
                            <select name="duration" class="border rounded px-2 py-1 w-full">
                                <option value="1">1 Hari</option>
                                <option value="2">2 Hari</option>
                                <option value="3">3 Hari</option>
                                <option value="4">4 Hari</option>
                            </select>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit"
                                class=" px-4 py-2 border rounded-lg hover:bg-gray-50 ">
                                Booking Sekarang
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Rekomendasi Produk --}}
                @if ($relatedProducts->count() > 0)
                    <div class="bg-white shadow rounded-2xl p-6">
                        <h3 class="font-semibold text-lg mb-4">Peralatan Lainnya</h3>
                        <div class="space-y-4">
                            @foreach ($relatedProducts as $related)
                                <a href="{{ route('product.detail', $related->id) }}"
                                    class="flex items-center gap-4 hover:bg-gray-50 rounded-lg p-2 transition">
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}"
                                        class="w-16 h-16 object-cover rounded">
                                    <div>
                                        <p class="font-medium text-sm">{{ $related->name }}</p>
                                        <p class="text-xs text-gray-500">
                                            Rp{{ number_format($related->price, 0, ',', '.') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
