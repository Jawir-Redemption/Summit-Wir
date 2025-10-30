@extends('layouts.customer')

@section('title','Cara Sewa | SummitWirr')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
  <h1 class="text-2xl font-bold mb-4">Cara Sewa</h1>
  <p class="text-gray-600 mb-6">Ini halaman panduan cara menyewa perlengkapan di SummitWirr. Isi ini dengan langkah-langkah singkat (mis. pilih produk → tentukan durasi → checkout → bayar DP).</p>

  <ol class="list-decimal list-inside space-y-2 text-gray-700">
    <li>Pilih produk yang ingin disewa.</li>
    <li>Tentukan jumlah dan durasi sewa.</li>
    <li>Checkout dan isi data pemesan.</li>
    <li>Transfer DP (20% atau sesuai kebijakan) untuk konfirmasi booking.</li>
    <li>Ambil / terima perlengkapan sesuai jadwal.</li>
  </ol>
</section>
@endsection
