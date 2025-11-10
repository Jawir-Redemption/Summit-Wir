@extends('layouts.customer')

@section('title','Semua Produk | SummitWirr')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
  <h1 class="text-2xl font-bold mb-4">Semua Produk</h1>
  <p class="text-gray-600 mb-6">Filter / sorting akan ditambahkan di sini. Saat ini menampilkan data dari variabel <code>$products</code> jika tersedia.</p>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @if(isset($products) && $products->count())
      @foreach($products as $product)
        <div class="bg-white rounded-lg shadow p-4">
          <img src="{{ isset($product->image) ? asset('storage/'.$product->image) : asset('assets/images/dummy1.jpg') }}" class="w-full h-40 object-cover rounded mb-3" alt="{{ $product->name ?? 'Produk' }}">
          <h3 class="font-semibold">{{ $product->name ?? 'Nama Produk' }}</h3>
          <p class="text-sm text-gray-500">{{ $product->category->name ?? '-' }}</p>
          <p class="font-bold text-blue-600 mt-2">Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}</p>
          <div class="mt-3 flex justify-between">
            <a href="/product/{{ $product->id ?? '#' }}" class="px-3 py-1.5 bg-blue-600 text-white rounded">Lihat</a>
            <button class="px-3 py-1.5 border rounded text-sm">+ Keranjang</button>
          </div>
        </div>
      @endforeach
    @else
      <div class="col-span-full text-center text-gray-500 py-12">
        Belum ada produk untuk ditampilkan.
      </div>
    @endif
  </div>
</section>
@endsection
