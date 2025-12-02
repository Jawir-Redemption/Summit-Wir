<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Login Page - Shoes')</title>

    {{-- Vite (Tailwind + JS dari Laravel) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Inter --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
</head>

<body class="font-sans antialiased bg-cover bg-center bg-no-repeat"
      style="background-image: url('{{ asset('img/TEST.jpg') }}');">

    {{-- Content --}}
    <main class="pt-24">
        @yield('content')
    </main>



</body>
</html>
