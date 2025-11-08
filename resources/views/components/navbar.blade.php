<nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-500 bg-transparent">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">

        {{-- Logo kiri --}}
        <a href="{{ route('home') }}" class="flex items-center space-x-2 scroll-smooth">
            <img src="{{ asset('assets/img/logo-s.png') }}" alt="SummitWir Logo" class="h-10 w-auto object-contain">
            <span id="nav-brand" class="text-2xl font-bold text-white">SummitWir</span>
        </a>

        {{-- Menu tengah --}}
        <ul class="hidden md:flex space-x-8 font-medium absolute left-1/2 transform -translate-x-1/2">
            <li><a href="{{ route('home') }}" class="nav-link text-white hover:text-green-400 transition">Home</a></li>
            <li><a href="{{ route('products') }}"
                    class="nav-link text-white hover:text-green-400 transition">Products</a></li>
            <li><a href="{{ route('guide') }}" class="nav-link text-white hover:text-green-400 transition">Guide</a>
            </li>
        </ul>

        {{-- Bagian kanan: Cart & Account --}}
        <div class="hidden md:flex items-center space-x-6">
            <a href="{{ route('cart') }}" class="text-white hover:text-green-400 transition" title="Keranjang">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.293 2.707A1 1 0 007.618 17h8.764a1 1 0 00.911-1.293L17 13M10 21h.01M14 21h.01" />
                </svg>
            </a>

            <a href="{{ route('account') }}" class="text-white hover:text-green-400 transition" title="Akun">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9 9 0 1118.879 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>

            {{-- Tombol login/logout --}}
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-green-600 text-white px-3 py-1.5 rounded-lg hover:bg-green-700 transition text-sm">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm">
                    Login
                </a>
            @endauth
        </div>

        {{-- Tombol menu mobile --}}
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Menu mobile dropdown --}}
    <div id="mobile-menu"
        class="md:hidden bg-white/95 backdrop-blur-md border-t overflow-hidden max-h-0 transition-[max-height_opacity] duration-300 ease-in-out opacity-0">
        <ul class="flex flex-col space-y-2 p-4 text-gray-800 font-medium">
            <li><a href="{{ route('home') }}" class="block py-2 hover:text-green-600 transition">Home</a></li>
            <li><a href="{{ route('products') }}" class="block py-2 hover:text-green-600 transition">Products</a></li>
            <li><a href="{{ route('guide') }}" class="block py-2 hover:text-green-600 transition">Guide</a></li>
            <li><a href="{{ route('cart') }}" class="block py-2 hover:text-green-600 transition">Cart</a></li>
            <li><a href="{{ route('account') }}" class="block py-2 hover:text-green-600 transition">Account</a></li>
        </ul>
    </div>
</nav>

{{-- Script scroll & mobile menu (tetap sama seperti punyamu) --}}
<script>
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('.nav-link');
    const navBrand = document.getElementById('nav-brand');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-white/90', 'backdrop-blur-md', 'shadow-md');
            navLinks.forEach(link => {
                link.classList.remove('text-white', 'hover:text-green-400');
                link.classList.add('text-gray-800', 'hover:text-green-600');
            });
            navBrand.classList.remove('text-white');
            navBrand.classList.add('text-gray-900');
        } else {
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('bg-white/90', 'backdrop-blur-md', 'shadow-md');
            navLinks.forEach(link => {
                link.classList.add('text-white', 'hover:text-green-400');
                link.classList.remove('text-gray-800', 'hover:text-green-600');
            });
            navBrand.classList.add('text-white');
            navBrand.classList.remove('text-gray-900');
        }
    });

    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.contains('open');
        mobileMenu.style.maxHeight = isOpen ? '0' : '400px';
        mobileMenu.style.opacity = isOpen ? '0' : '1';
        mobileMenu.classList.toggle('open');
    });
</script>

@if (!request()->is('customer/home') && !request()->is('home'))
    <div class="h-16"></div>
@endif
