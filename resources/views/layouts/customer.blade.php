<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SummitWirr')</title>

    {{-- Vite (Tailwind + JS otomatis dari Laravel) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

</body>
</html>
