@extends('layouts.customer')

@section('title', 'Pembayaran Tertunda | SummitWirr')

@section('content')
    <section class="container mx-auto py-16 px-6">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-md p-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Pembayaran Tertunda</h1>
            <p class="text-gray-600 mb-6">
                Kami menerima permintaan pembayaran Anda, tetapi pembayaran belum selesai.
                Silakan selesaikan pembayaran melalui QRIS sebelum kadaluarsa.
            </p>

            {{-- QR code reminder / order info --}}
            <div class="bg-gray-100 p-6 rounded-xl mb-6">
                <p class="text-gray-700 font-medium">Nomor Pesanan:</p>
                <p class="text-gray-900 font-bold text-lg">{{ $order->id }}</p>
                <p class="text-gray-700 mt-2">Jumlah yang harus dibayar: <span class="font-bold">Rp
                        {{ number_format($order->total_price, 0, ',', '.') }}</span></p>
            </div>

            <a href="{{ route('checkout', $order) }}"
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition">
                Kembali ke Checkout
            </a>
        </div>
    </section>
@endsection
