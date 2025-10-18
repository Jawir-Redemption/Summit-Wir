@extends('layouts.app')
@section('title', 'Dashboard - Summit Wir')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Transaksi
        </h2>
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama Customer</th>
                            <th class="px-4 py-3">No. Hp</th>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="px-4 py-3">Paket Durasi</th>
                            <th class="px-4 py-3">Total Sewa</th>
                            <th class="px-4 py-3">Waktu Checkout</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($orders as $order)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->user->name }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ $order->user->no_hp }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @foreach ($order->orderDetails as $item)
                                        {{ $item->product->name . ' x' . $item->quantity }} <br>
                                    @endforeach
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    Kategori 1
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ 'Rp.' . number_format($order->total_price, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                    <div class="bg-gray-700 rounded-lg p-2">
                        {{ $orders->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
