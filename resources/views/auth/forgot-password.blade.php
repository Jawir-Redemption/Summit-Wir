@extends('layouts.auth')
@section('title', 'Forgot Password')
@section('content')
    <div class="container md:max-w-md mx-auto text-white">
        @if (session('status'))
            <div class="bg-green-200 p-3 rounded mb-3 text-black">
                {{ session('status') }}
            </div>
        @endif

        @error('email')
            <div class="bg-red-200 p-3 rounded mb-3 text-black">
                {{ $message }}
            </div>
        @enderror

        <form method="POST" action="{{ route('password.email') }}" class="space-y-3">
            @csrf
            <input type="email" name="email" placeholder="Email" class="border p-2 w-full">
            <button class="bg-blue-500 text-white p-2 rounded w-full">Send Reset Link</button>
        </form>
    </div>
@endsection
