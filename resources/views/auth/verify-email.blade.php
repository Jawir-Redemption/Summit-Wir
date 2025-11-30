@extends('layouts.customer')

@section('title', 'Verifikasi Email | SummitWirr')

@section('content')
    <section class="w-4/5 md:w-1/2 mx-auto bg-gray-50 flex items-center justify-center px-6 py-20">

        <div class="bg-white shadow-lg rounded-2xl p-8 max-w-md w-full text-center">

            <div class="flex justify-center mb-4">
                <svg class="w-14 h-14 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 11H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2z" />
                </svg>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-2">
                Verifikasi Email Anda
            </h2>

            <p class="text-gray-600 text-sm leading-relaxed mb-6">
                Terima kasih telah mendaftar di <span class="text-blue-600 font-semibold">SummitWirr</span>!
                Sebelum melanjutkan, silakan cek email Anda dan klik link verifikasi yang telah kami kirimkan.
            </p>

            @if (session('message'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 text-sm rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            {{-- RESEND BUTTON --}}
            <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
                @csrf
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium transition shadow">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            {{-- LOGOUT BUTTON --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-3 rounded-lg font-medium transition">
                    Logout
                </button>
            </form>
        </div>

    </section>
@endsection
