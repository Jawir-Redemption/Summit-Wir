<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Login Page - Shoes')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    backgroundImage: {
                        'shoe-image': "url('/img/tenda.jpg')",
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-cover bg-center bg-no-repeat" style="background-image: url('/img/TEST.jpg');">


    {{-- Konten Halaman --}}
    <main class="pt-24">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

</body>
</html>
