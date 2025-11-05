{{-- resources/views/layouts/customer.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'SummitWirr')</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- [TAMBAHAN HANIF] Font Inter untuk konsistensi desain -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />

  <!-- [TAMBAHAN HANIF] Tambahan transition halus saat scroll -->
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

  {{-- [TETAP] Navbar & Header dipanggil dari komponen --}}
  @includeIf('components.navbar')

  <main class="flex-grow">
    @yield('content')
  </main>

  {{-- [TETAP] Footer dipanggil dari komponen --}}
  @includeIf('components.footer')

  <!-- [TAMBAHAN HANIF] Script kecil untuk efek transparan navbar saat scroll -->
  <script>
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar?.classList.add('backdrop-blur-md', 'bg-white/70', 'shadow-md');
      } else {
        navbar?.classList.remove('backdrop-blur-md', 'bg-white/70', 'shadow-md');
      }
    });
  </script>

</body>
</html>
