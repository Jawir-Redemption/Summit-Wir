<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'SummitWirr')</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
</head>
<body class="font-inter bg-gray-50 text-gray-800">

  <!-- Navbar -->
  @includeIf('components.navbar')

  <main class="min-h-screen">
    @yield('content')
  </main>

  <!-- Footer -->
  @includeIf('components.footer')

</body>
</html>
