<!DOCTYPE html>
<html x-data="data()" lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        
        {{-- icon logo pada url --}}
        <link rel="icon" href="{{ asset('assets/img/logo-f.png') }}" type="image/png">
         

        <!-- Fonts & Styles -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet" href="/assets/css/tailwind.output.css" />

        <!-- Alpine.js -->
        <script src="/assets/js/alpine.js" defer></script>

        <!-- Custom Scripts -->
        <script src="/assets/js/init-alpine.js"></script>
    </head>

    <body>
        <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
            <!-- Desktop sidebar -->
            @include('components.desktop-sidebar')

            <!-- Mobile sidebar -->
            @include('components.mobile-sidebar')

            <!-- Main Content -->
            <div class="flex flex-col flex-1 w-full">
                @include('components.header')
                <main class="h-full overflow-y-auto">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>

</html>
