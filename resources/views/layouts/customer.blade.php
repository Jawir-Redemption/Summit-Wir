<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SummitWirr')</title>
    
    
    <link rel="icon" href="{{ asset('assets/img/logo-f.png') }}" type="image/png">

    {{-- Vite (Tailwind + JS otomatis dari Laravel) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Reusable Animations --}}
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">

    {{-- Brand Marquee CSS --}}
    <link rel="stylesheet" href="{{ asset('css/brand-marquee.css') }}">
    @stack('styles')

    {{-- Font Inter --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap">

    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
        }
    </style>
    
</head>

<body class="min-h-screen flex flex-col">

    {{-- Navbar --}}
    @includeIf('components.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @includeIf('components.footer')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    {{-- Script efek transparan navbar --}}
    <script>
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar?.classList.add(
                    'backdrop-blur-md', 
                    'bg-white/70', 
                    'shadow-md'
                );
            } else {
                navbar?.classList.remove(
                    'backdrop-blur-md', 
                    'bg-white/70', 
                    'shadow-md'
                );
            }
        });
    </script>

    {{-- Animations Script --}}
        <script src="{{ asset('js/scroll-animations.js') }}"></script>
</body>
</html>
