@extends('layouts.customer')

@section('title', 'Checkout | SummitWirr')

@section('content')
    <section class="max-w-5xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-6">Checkout</h1>

        {{-- Order Summary --}}
        <div class="bg-white p-6 rounded shadow">
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-3">Detail Pesanan</h2>

                {{-- Table of products --}}
                <table class="w-full text-sm border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left p-2">Produk</th>
                            <th class="text-center p-2">Jumlah</th>
                            <th class="text-right p-2">Harga Satuan</th>
                            <th class="text-right p-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $detail)
                            <tr class="border-b">
                                <td class="p-2">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('storage/' . $detail->product->image) }}"
                                            class="w-12 h-12 object-cover rounded">
                                        <span>{{ $detail->product->name }}</span>
                                    </div>
                                </td>
                                <td class="text-center p-2">{{ $detail->quantity }}</td>
                                <td class="text-right p-2">Rp {{ number_format($detail->product->price, 0, ',', '.') }}</td>
                                <td class="text-right p-2">
                                    Rp {{ number_format($detail->product->price * $detail->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Duration --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Durasi</h2>
                <p>Durasi: <strong>{{ $order->duration }} hari</strong></p>
            </div>

            {{-- Total --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Ringkasan Biaya</h2>
                @php
                    $dp = $order->total_price * 0.5;
                @endphp
                <p class="text-gray-600">Total Harga:</p>
                <p class="text-sm text-gray-500">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                <p class="font-bold text-xl ">DP (50%): Rp{{ number_format($dp, 0, ',', '.') }}</p>
            </div>

            {{-- Customer Info --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Informasi Pemesan</h2>
                <p><strong>Nama:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                <p><strong>Tempat Pengambilan:</strong> Kantor Summit Wirr (Telkom University Purwokerto)</p>
                <p><strong>Note:</strong> Lakukan sisa pembayaran sebesar
                    Rp{{ number_format($order->total_price - $dp, 0, ',', '.') }} saat pengambilan barang.</p>
            </div>

            {{-- Action Buttons --}}
            <div class="flex gap-3">
                <form action="{{ route('payment.pay', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Konfirmasi & Lanjut ke Pembayaran
                    </button>
                </form>

                <form action="{{ route('checkout.cancel', $order->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2 border rounded hover:bg-gray-100 transition">
                        Batal
                    </button>
                </form>

            </div>
        </div>
    </section>
@endsection
