@extends('layouts.customer')

@section('title','Checkout | SummitWirr')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-12">
  <h1 class="text-2xl font-bold mb-4">Checkout</h1>

  <div class="bg-white p-6 rounded shadow">
    <p class="text-gray-700 mb-4">Detail produk, jumlah, durasi, dan total akan muncul di sini. Untuk sementara ini adalah placeholder.</p>

    <div class="mb-4">
      <label class="block text-sm mb-1">Nama Pemesan</label>
      <input type="text" class="w-full border rounded px-3 py-2" placeholder="Nama lengkap">
    </div>

    <div class="mb-4">
      <label class="block text-sm mb-1">Total Harga</label>
      <p class="font-bold text-lg">Rp0</p>
      <p class="text-sm text-gray-500">DP (20%): Rp0</p>
    </div>

    <div class="flex gap-3">
      <button class="px-4 py-2 bg-blue-600 text-white rounded">Konfirmasi Booking</button>
      <a href="/home" class="px-4 py-2 border rounded">Batal</a>
    </div>
  </div>
</section>
@endsection
