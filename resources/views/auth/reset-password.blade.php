@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')
    <form method="POST" action="{{ route('password.update') }}" class="container md:max-w-md mx-auto text-white">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        @error('email')
            <div class="bg-red-200 p-3">{{ $message }}</div>
        @enderror

        <input type="email" name="email" placeholder="Email" class="border p-2 w-full">
        <input type="password" name="password" placeholder="New Password" class="border p-2 w-full">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border p-2 w-full">

        <button class="bg-blue-500 text-white p-2 rounded w-full">Reset Password</button>
    </form>
@endsection
