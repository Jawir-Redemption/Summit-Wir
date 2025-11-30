@extends('layouts.customer')

@section('title', 'Pembayaran | SummitWirr')

@section('content')
    <section class="max-w-3xl mx-auto px-6 py-12 text-center">
        <h1 class="text-2xl font-bold mb-6">Pembayaran Pesanan #{{ $order->id }}</h1>
        <p class="text-lg mb-4">Total: <strong>Rp {{ number_format($order->total_price * 0.5, 0, ',', '.') }}</strong></p>

        <button id="pay-button" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Bayar Sekarang
        </button>

        <form id="payment-form" action="{{ route('checkout.process', ['order' => $order->id]) }}" method="POST"
            style="display: none;">
            @csrf
        </form>
    </section>

    <script src="/assets/js/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        document.getElementById('pay-button').addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = "{{ route('payment.status', ['order' => $order->id]) }}";
                },
                onPending: function(result) {
                    window.location.href = "{{ route('payment.status', ['order' => $order->id]) }}";
                },
                onError: function(result) {
                    window.location.href = "{{ route('payment.status', ['order' => $order->id]) }}";
                },
                onClose: function() {
                    //
                }
            });
        });
    </script>
@endsection
