<nav class="bg-white border-b shadow-sm fixed w-full z-10 top-0">
  <div class="container mx-auto flex justify-between items-center py-3 px-6">
    {{-- Logo --}}
    <a href="{{ url('/') }}" class="text-2xl font-bold text-green-700">
      SummitWir
    </a>

    {{-- Menu utama --}}
    <ul class="hidden md:flex space-x-8 text-gray-700 font-medium">
      <li><a href="{{ url('/') }}" class="hover:text-green-600">Home</a></li>
      <li><a href="{{ url('/products') }}" class="hover:text-green-600">Products</a></li>
      <li><a href="{{ url('/guide') }}" class="hover:text-green-600">Guide</a></li>
      <li><a href="{{ url('/cart') }}" class="hover:text-green-600">Cart</a></li>
      <li><a href="{{ url('/account') }}" class="hover:text-green-600">Account</a></li>
    </ul>

    {{-- Tombol login / logout --}}
    <div class="flex items-center space-x-4">
      @auth
        <span class="text-gray-600 text-sm">Hi, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Logout
          </button>
        </form>
      @else
        <a href="{{ route('login') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
          Login
        </a>
      @endauth
    </div>

    {{-- Menu mobile --}}
    <div class="md:hidden">
      <button id="menu-toggle" class="focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

  {{-- Dropdown menu untuk mobile --}}
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
    <ul class="flex flex-col space-y-2 p-4 text-gray-700">
      <li><a href="{{ url('/') }}" class="hover:text-green-600">Home</a></li>
      <li><a href="{{ url('/products') }}" class="hover:text-green-600">Products</a></li>
      <li><a href="{{ url('/guide') }}" class="hover:text-green-600">Guide</a></li>
      <li><a href="{{ url('/cart') }}" class="hover:text-green-600">Cart</a></li>
      <li><a href="{{ url('/account') }}" class="hover:text-green-600">Account</a></li>
    </ul>
  </div>

  {{-- Script untuk toggle mobile --}}
  <script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    });
  </script>
</nav>

{{-- Spacer supaya konten tidak ketutup navbar fixed --}}
<div class="h-16"></div>
