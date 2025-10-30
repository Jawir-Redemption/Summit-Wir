@extends('layouts.customer')

@section('title','Keranjang | SummitWirr')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
  <h1 class="text-2xl font-bold mb-4">Keranjang Saya</h1>

  @if(isset($cartItems) && count($cartItems))
    <div class="space-y-4">
      @foreach($cartItems as $item)
        <div class="bg-white p-4 rounded shadow flex items-center justify-between">
          <div class="flex items-center gap-4">
            <img src="{{ isset($item->product->image) ? asset('storage/'.$item->product->image) : asset('assets/images/dummy1.jpg') }}" class="w-20 h-20 object-cover rounded">
            <div>
              <h3 class="font-semibold">{{ $item->product->name ?? 'Produk' }}</h3>
              <p class="text-sm text-gray-500">Durasi: {{ $item->duration ?? 1 }} hari</p>
            </div>
          </div>
          <div class="text-right">
            <p class="font-bold">Rp{{ number_format(($item->product->price ?? 0) * ($item->qty ?? 1),0,',','.') }}</p>
          </div>
        </div>
      @endforeach

      <div class="text-right">
        <a href="/checkout" class="px-6 py-2 bg-blue-600 text-white rounded">Checkout</a>
      </div>
    </div>
  @else
    <div class="text-center py-12 text-gray-500">
      Keranjang kosong.
    </div>
  @endif
</section>
@endsection
