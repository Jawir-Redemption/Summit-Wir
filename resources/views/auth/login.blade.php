<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page - Shoes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    backgroundImage: {
                        'shoe-image': "url('/img/hanip.jpg')",
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 bg-white shadow-2xl rounded-3xl overflow-hidden">

            <!-- Side Shoe Image -->
            <div class="bg-shoe-image bg-cover bg-center hidden md:block relative">

            </div>

            <!-- Login Form -->
            <div class="p-10 sm:p-16 flex flex-col justify-center bg-white">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Sign in to your account</h2>

                <form class="space-y-6" method="POST" action="{{ route('login.post') }}" >
                    @csrf
                    <!-- Email -->
                    <div class="relative">
                        <input type="email" id="email" name="email" required
                            class="peer w-full border-b-2 border-gray-300 placeholder-transparent focus:outline-none focus:border-blue-500 text-gray-900 py-3 px-1"
                            placeholder="Email address" />
                        <label for="email"
                            class="absolute left-1 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm">
                            Email address
                        </label>
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="peer w-full border-b-2 border-gray-300 placeholder-transparent focus:outline-none focus:border-blue-500 text-gray-900 py-3 px-1"
                            placeholder="Password" />
                        <label for="password"
                            class="absolute left-1 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm">
                            Password
                        </label>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" class="accent-blue-600" />
                            Remember me
                        </label>
                        <a href="#" class="text-blue-600 hover:underline">Forgot password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition duration-300 shadow-lg">
                        Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="flex items-center gap-4 my-6">
                    <hr class="flex-grow border-gray-300" />
                    <span class="text-gray-400 text-sm">OR</span>
                    <hr class="flex-grow border-gray-300" />
                </div>

                <!-- Social Logins -->
                <div class="flex flex-col gap-4">
                    <button
                        class="flex items-center justify-center gap-3 py-2 px-4 border border-gray-300 rounded-xl bg-white hover:bg-gray-100 transition">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5"
                            alt="Google" />
                        Continue with Google
                    </button>
                    <button
                        class="flex items-center justify-center gap-3 py-2 px-4 border border-gray-300 rounded-xl bg-white hover:bg-gray-100 transition">
                        <img src="https://www.svgrepo.com/show/512828/github-142.svg" class="w-5 h-5" alt="GitHub" />
                        Continue with GitHub
                    </button>
                </div>

                <!-- Sign Up Link -->
                <p class="text-center text-sm text-gray-600 mt-6">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>
