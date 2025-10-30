@extends('layouts.customer')

@section('title', 'Akun Saya')

@section('content')
<section class="container mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold mb-6">Akun Saya</h1>

  @if($user)
    <div class="bg-white rounded-xl shadow-md p-6">
      <p><strong>Nama:</strong> {{ $user->name }}</p>
      <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>
  @else
    <p>Silakan <a href="{{ route('login') }}" class="text-blue-500 underline">login</a> untuk melihat akun Anda.</p>
  @endif
</section>
@endsection
