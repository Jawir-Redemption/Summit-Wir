@extends('layouts.customer')

@section('title', 'Pembayaran Berhasil | SummitWirr')

@section('content')
    <section class="max-w-3xl mx-auto px-6 py-12 text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-4">Pembayaran Berhasil 🎉</h1>
        <p class="text-lg mb-2">Pesanan #{{ $order->id }} telah dibayar.</p>
        <p class="text-gray-600 mb-6">
            Silakan ambil barang sewaan Anda di lokasi berikut:
        </p>

        <div class="bg-gray-100 p-4 rounded-md mb-6">
            <p><strong>Tempat Pengambilan:</strong> Kantor Summit Wirr, Telkom University Purwokerto</p>
        </div>

        <a href="{{ route('home') }}" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Kembali ke Beranda
        </a>
    </section>
@endsection
