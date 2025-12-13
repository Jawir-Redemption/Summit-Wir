@extends('layouts.customer')

@section('title', 'Keranjang | SummitWirr')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-4">Keranjang Saya</h1>

        @if (isset($cartItems) && count($cartItems))
            <div class="space-y-4">
                @foreach ($cartItems as $item)
                    <div class="bg-white p-4 rounded shadow flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('product.detail', $item->product->id) }}" class="flex-shrink-0">
                                <img src="{{ asset('storage/' . $item->product->image) }}" 
                                    class="w-20 h-20 object-cover rounded hover:opacity-80 transition-opacity cursor-pointer"
                                    alt="{{ $item->product->name ?? 'Produk' }}">
                            </a>
                            <div>
                                <a href="{{ route('product.detail', $item->product->id) }}" 
                                    class="hover:text-blue-600 transition-colors">
                                    <h3 class="font-semibold">{{ $item->product->name ?? 'Produk' }}</h3>
                                </a>
                                <p class="text-sm text-gray-500">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                            </div>

                            {{-- Quantity Controls --}}
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                    class="flex items-center gap-2 autosave-form">
                                    @csrf
                                    @method('PATCH')
                                    <button type="button"
                                        class="decrement px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                                        −
                                    </button>
                                    <input type="number"name="quantity" value="{{ $item->quantity }}" min="1"
                                        class="w-12 text-center border-x border-gray-300 focus:outline-none quantity-input">
                                    <button type="button"
                                        class="increment px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                                        +
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="text-right">
                            <p class="font-bold">Rp
                                {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                            </p>
                            
                            {{-- TAMBAHAN: Tombol Hapus --}}
                            <form action="{{ route('cart.delete', $item->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm transition">
                                    Hapus
                                </button>
                            </form>
                            {{-- AKHIR TAMBAHAN --}}
                        </div>
                    </div>
                @endforeach

                {{-- Duration + Checkout --}}
                <form action="{{ route('checkout.process') }}" method="POST"
                    class="flex justify-end items-center gap-4 mt-6">
                    @csrf
                    <div>
                        <label for="duration" class="text-sm text-gray-600 mr-2">Durasi Sewa:</label>
                        <select name="duration" id="duration" class="border rounded px-2 py-1">
                            @for ($i = 1; $i <= 14; $i++)
                                <option value="{{ $i }}">{{ $i }} hari</option>
                            @endfor
                        </select>
                    </div>

                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Checkout
                    </button>
                </form>
            </div>
        @else
            <div class="text-center py-12 text-gray-500">
                Keranjang kosong.
            </div>
        @endif
    </section>

    {{-- JavaScript for autosave --}}
    <script>
        document.querySelectorAll('.autosave-form').forEach(form => {
            const qtyInput = form.querySelector('.quantity-input');
            const incBtn = form.querySelector('.increment');
            const decBtn = form.querySelector('.decrement');

            incBtn.addEventListener('click', () => {
                qtyInput.value = parseInt(qtyInput.value) + 1;
                form.requestSubmit(); // auto-submit form
            });

            decBtn.addEventListener('click', () => {
                if (parseInt(qtyInput.value) > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                    form.requestSubmit();
                }
            });

            // Optional: autosave when user types manually
            qtyInput.addEventListener('change', () => {
                if (qtyInput.value < 1) qtyInput.value = 1;
                form.requestSubmit();
            });
        });
    </script>
@endsection