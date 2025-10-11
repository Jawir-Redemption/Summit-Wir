@extends('layouts.auth')

@section('title', 'Register Page - Shoes')

@section('content')
<div class="min-h-screen flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div>
                <img src="https://storage.googleapis.com/devitary-image-host.appspot.com/15846435184459982716-LogoMakr_7POjrN.png"
                    class="w-32 mx-auto" />
            </div>

            <div class="mt-12 flex flex-col items-center">
                <h1 class="text-2xl xl:text-3xl font-extrabold">Sign up</h1>

                <div class="w-full flex-1 mt-8">
                    <!-- Social Login Buttons -->
                    <div class="flex flex-col items-center">
                        <button
                            class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-indigo-100 text-gray-800 flex items-center justify-center hover:shadow">
                            <div class="bg-white p-2 rounded-full">
                                <svg class="w-4" viewBox="0 0 533.5 544.3"><path fill="#4285f4"
                                        d="M533.5 278.4c0-18.5-1.5-37.1..." /></svg>
                            </div>
                            <span class="ml-4">Sign Up with Google</span>
                        </button>

                        <button
                            class="mt-5 w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-indigo-100 text-gray-800 flex items-center justify-center hover:shadow">
                            <div class="bg-white p-1 rounded-full">
                                <svg class="w-6" viewBox="0 0 32 32"><path fill-rule="evenodd"
                                        d="M16 4C9.371 4 4 9.371..." /></svg>
                            </div>
                            <span class="ml-4">Sign Up with GitHub</span>
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="my-12 border-b text-center">
                        <div class="px-2 inline-block text-sm text-gray-600 bg-white translate-y-1/2">
                            Or sign up with e-mail
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="mx-auto max-w-xs">
                        <input
                            class="w-full px-8 py-4 rounded-lg bg-gray-100 border border-gray-200 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                            type="email" placeholder="Email" />
                        <input
                            class="w-full mt-5 px-8 py-4 rounded-lg bg-gray-100 border border-gray-200 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                            type="password" placeholder="Password" />

                        <button
                            class="mt-5 w-full py-4 rounded-lg font-semibold bg-indigo-500 hover:bg-indigo-700 text-white flex items-center justify-center transition-all duration-300">
                            <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            <span class="ml-3">Sign Up</span>
                        </button>

                        <p class="mt-6 text-xs text-gray-600 text-center">
                            I agree to abide by <a href="#" class="text-blue-500">Terms</a> &
                            <a href="#" class="text-blue-500">Privacy Policy</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side Image -->
        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
            </div>
        </div>
    </div>
</div>
@endsection
