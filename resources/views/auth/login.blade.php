@extends('layouts.auth')

@section('title', 'Login Page - Shoes')

@section('content')
    <div class="max-h-screen flex items-center justify-center bg-center bg-no-repeat bg-contain">

        <div class="w-full max-w-3xl grid grid-cols-1 md:grid-cols-2 bg-white shadow-2xl rounded-3xl overflow-hidden">

            <!-- Side Shoe Image -->
            <div class="hidden md:block bg-cover bg-center relative"
                style="background-image: url('{{ asset('img/tenda.jpg') }}');">
            </div>


            <!-- Login Form -->
            <div class="p-10 sm:p-10 flex flex-col justify-center bg-white">
                <h2 class="text-3lg font-extrabold text-gray-800 mb-8">Sign in to your account</h2>
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
                
                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="relative">
                        <input type="email" id="email" name="email" required
                            class="peer w-full border-b-2 border-gray-300 placeholder-transparent focus:outline-none 
                        focus:border-blue-500 text-gray-900 py-3 px-1"
                            placeholder=" " />
                        <label for="email"
                            class="absolute left-1 top-3 text-gray-500 transition-all duration-200
                        peer-focus:top-0 peer-focus:text-xs
                        peer-[&:not(:placeholder-shown)]:top-0
                        peer-focus:text-blue-500
                        peer-[&:not(:placeholder-shown)]:text-xs">
                            Email address
                        </label>
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="peer w-full border-b-2 border-gray-300 placeholder-transparent focus:outline-none 
                        focus:border-blue-500 text-gray-900 py-3 px-1"
                            placeholder="Password" />
                        <label for="password"
                            class="absolute left-1 top-3 text-gray-500 text-base transition-all duration-200
                        peer-focus:top-0 peer-focus:text-xs 
                        peer-focus:text-blue-500
                        peer-valid:top-0 peer-valid:text-xs">
                            Password
                        </label>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" class="accent-blue-600" />
                            Remember me
                        </label>
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Forgot password?</a>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition duration-300 shadow-lg">
                        Sign In
                    </button>
                </form>

                <!-- Sign Up Link -->
                <p class="text-center text-sm text-gray-600 mt-6">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
                </p>
            </div>
        </div>
    </div>
@endsection
