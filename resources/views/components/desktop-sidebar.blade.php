<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('admin.index') }}">
            Summit Wir
        </a>
        <ul class="mt-6">

            {{-- Dashboard --}}
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.index'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a href="{{ route('admin.index') }}"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150
                        {{ request()->routeIs('admin.index') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 hover:text-gray-800 dark:hover:text-gray-200' }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>

            {{-- Orders --}}
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.orders.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a href="{{ route('admin.orders.index') }}"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150
                        {{ request()->routeIs('admin.orders.*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 hover:text-gray-800 dark:hover:text-gray-200' }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Pesanan</span>
                </a>
            </li>

            {{-- Categories --}}
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.categories.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a href="{{ route('admin.categories.index') }}"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150
                        {{ request()->routeIs('admin.categories.*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 hover:text-gray-800 dark:hover:text-gray-200' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>

                    <span class="ml-4">Kategori Produk</span>
                </a>
            </li>

            {{-- Products --}}
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.products.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a href="{{ route('admin.products.index') }}"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150
                        {{ request()->routeIs('admin.products.*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 hover:text-gray-800 dark:hover:text-gray-200' }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span class="ml-4">Produk</span>
                </a>
            </li>

            {{-- Users --}}
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.users.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150
                        {{ request()->routeIs('admin.users.*') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-500 hover:text-gray-800 dark:hover:text-gray-200' }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="ml-4">Pengguna</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
