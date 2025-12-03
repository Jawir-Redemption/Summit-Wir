@extends('layouts.auth')

@section('title', 'Register - Shoes')

@section('content')
    <div class="min-h-screen flex justify-center py-12 px-4">
        <div class="bg-white shadow-lg rounded-2xl flex w-full max-w-4xl overflow-hidden">

            <!-- Form -->
            <div class="w-full lg:w-1/2 p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Create Your Account</h2>
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 border border-red-300 p-4 text-red-800">
                        <div class="font-semibold">There were some errors:</div>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                   </div>
                @endif
                <form class="mt-8 space-y-6" method="POST" action="{{ route('register.post') }}">
                    @csrf

                    <!-- Full Name -->
                    <div class="relative">
                        <input type="text" name="name" id="name" required
                            class="peer w-full border-b-2 border-gray-300 focus:border-indigo-500 outline-none py-3 placeholder-transparent"
                            placeholder="Full Name">
                        <label for="name"
                            class="absolute left-0 top-3 text-gray-500 transition-all peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 peer-valid:-top-2 peer-valid:text-sm">
                            Full Name
                        </label>
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <input type="email" name="email" id="email" required
                            class="peer w-full border-b-2 border-gray-300 focus:border-indigo-500 outline-none py-3 placeholder-transparent"
                            placeholder="Email">
                        <label for="email"
                            class="absolute left-0 top-3 text-gray-500 transition-all peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 peer-valid:-top-2 peer-valid:text-sm">
                            Email Address
                        </label>
                    </div>

                    <!-- Phone -->
                    <div class="relative">
                        <input type="text" name="phone" id="phone" required
                            class="peer w-full border-b-2 border-gray-300 focus:border-indigo-500 outline-none py-3 placeholder-transparent"
                            placeholder="Phone Number">
                        <label for="phone"
                            class="absolute left-0 top-3 text-gray-500 transition-all peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 peer-valid:-top-2 peer-valid:text-sm">
                            Phone Number
                        </label>
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                            class="peer w-full border-b-2 border-gray-300 focus:border-indigo-500 outline-none py-3 placeholder-transparent"
                            placeholder="Password">
                        <label for="password"
                            class="absolute left-0 top-3 text-gray-500 transition-all peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 peer-valid:-top-2 peer-valid:text-sm">
                            Password
                        </label>
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="peer w-full border-b-2 border-gray-300 focus:border-indigo-500 outline-none py-3 placeholder-transparent"
                            placeholder="Confirm Password">
                        <label for="password_confirmation"
                            class="absolute left-0 top-3 text-gray-500 transition-all peer-focus:-top-2 peer-focus:text-sm peer-focus:text-indigo-500 peer-valid:-top-2 peer-valid:text-sm">
                            Confirm Password
                        </label>
                    </div>

                    <button
                        class="w-full mt-6 bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-3 rounded-lg transition duration-300">
                        Sign Up
                    </button>

                    <p class="text-center text-xs text-gray-500 mt-4">
                        I agree to the <a href="#" class="text-indigo-500">Terms</a> & <a href="#"
                            class="text-indigo-500">Privacy Policy</a>
                    </p>
                </form>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <!-- Right Image -->
            <div class="hidden lg:flex w-1/2 bg-indigo-50 justify-center items-center">
                <img src="/assets/svg/register.svg" class="w-80" alt="Illustration">
            </div>
        </div>
    </div>
@endsection
