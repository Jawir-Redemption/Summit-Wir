@extends('layouts.customer')

@section('title', isset($product) ? $product->name : 'Detail Produk')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-12">
  <a href="/products" class="text-sm text-blue-600 hover:underline">&larr; Kembali ke Semua Produk</a>

  <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
      <img src="{{ isset($product->image) ? asset('storage/'.$product->image) : asset('assets/images/dummy1.jpg') }}" alt="{{ $product->name ?? 'Produk' }}" class="w-full h-80 object-cover rounded">
    </div>

    <div>
      <h1 class="text-2xl font-bold">{{ $product->name ?? 'Nama Produk' }}</h1>
      <p class="text-sm text-gray-500 mb-3">{{ $product->category->name ?? '-' }}</p>
      <p class="text-blue-600 text-xl font-bold mb-4">Rp{{ number_format($product->price ?? 0,0,',','.') }}</p>

      <p class="text-gray-700 mb-6">{{ $product->description ?? 'Deskripsi produk belum tersedia.' }}</p>

      <form action="/cart" method="POST">
        @csrf
        <div class="mb-3">
          <label class="block text-sm mb-1">Jumlah</label>
          <input type="number" name="qty" value="1" min="1" class="w-24 border rounded px-2 py-1">
        </div>

        <div class="mb-4">
          <label class="block text-sm mb-1">Durasi (hari)</label>
          <select name="duration" class="border rounded px-2 py-1">
            <option value="1">1 Hari</option>
            <option value="2">2 Hari</option>
            <option value="3">3 Hari</option>
          </select>
        </div>

        <div class="flex items-center gap-3">
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Booking Sekarang</button>
          <a href="/checkout" class="px-4 py-2 border rounded">Checkout</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
