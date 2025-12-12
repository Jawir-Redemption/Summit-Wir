@extends('layouts.app')
@section('title', 'Detail Pesanan')

@section('content')
    <section class="section container mx-auto p-6">
        <div class="section-body space-y-6">
            <!-- Ringkasan Pesanan -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div class="flex flex-wrap justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">ID Pesanan: #{{ $order->id }}
                        </h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $order->created_at->translatedFormat('H:i:s, d F Y') }}
                        </p>
                    </div>

                </div>

                <!-- Info Boxes -->
                <div class="flex flex-col mt-6">
                    <!-- Pelanggan -->
                    <div
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-4 space-y-2 flex-1 min-w-[280px] m-2">
                        <div class="flex items-center space-x-2 text-gray-700 dark:text-gray-200 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>

                            <span class="ml-2">Pelanggan</span>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Nama:
                                {{ $order->user->name }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Email:
                                {{ $order->user->email }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">No. HP:
                                {{ $order->user->no_hp }}</p>
                    </div>
                    <div
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-4 space-y-2 flex-1 min-w-[280px] m-2 mt-4">
                        <div class="flex items-center space-x-2 text-gray-700 dark:text-gray-200 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>


                            <span class="ml-2">Detail Peminjaman</span>
                        </div>
                        @if ($order->display_status == 'pending')
                            <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Status: Pending
                            </p>
                        @elseif ($order->display_status == 'paid')
                            <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Status: Sudah
                                    Dibayar</p>
                        @elseif ($order->display_status == 'on_rent')
                            <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Status: Dalam
                                    Penyewaan</p>
                        @elseif ($order->display_status == 'overdue')
                            <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Status: Terlambat
                            </p>
                        @elseif ($order->display_status == 'completed')
                            <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Status: Selesai
                            </p>
                        @elseif ($order->display_status == 'cancelled')
                            <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Status: Dibatalkan
                            </p>
                        @endif
                        <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Tanggal Peminjaman:
                                {{ \Carbon\Carbon::parse($order->loan_date)->translatedFormat('H:i:s, d F Y') }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-300"><span class="font-medium">Tanggal Pengembalian:
                                {{ \Carbon\Carbon::parse($order->return_date)->translatedFormat('H:i:s, d F Y') }}</p>
                    </div>

                </div>

            </div>

            <!-- Tabel Produk -->
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Produk Dipesan
            </h2>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama Produk</th>
                                <th class="px-4 py-3">Jumlah</th>
                                <th class="px-4 py-3">Harga Sewa</th>
                                <th class="px-4 py-3">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($order->orderDetails as $item)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->product->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ 'Rp.' . number_format($item->product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ 'Rp.' . number_format($item->quantity * $item->product->price, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="mt-6 mr-auto text-right space-y-1">
                    <p class="text-sm text-gray-700 dark:text-gray-300">DP 50%:
                        {{ 'Rp.' . number_format($order->total_price * 0.5, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-700 dark:text-gray-300">Denda:
                        {{ 'Rp.' . number_format($order->total_fine, 0, ',', '.') }}</p>
                    <p class="text-xl font-semibold text-gray-800 dark:text-gray-100">Total:
                        {{ 'Rp.' . number_format($order->total_price + $order->total_fine, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
