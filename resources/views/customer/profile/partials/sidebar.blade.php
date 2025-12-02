{{-- Sidebar Menu Profil --}}
<div class="col-span-1 md:border-r md:pr-6">

    {{-- Header Profil --}}
    <div class="flex flex-col items-center mb-6 md:mb-10">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&size=80"
             class="w-16 h-16 md:w-20 md:h-20 rounded-full shadow-sm mb-3">

        <h2 class="text-base md:text-lg font-bold text-gray-800 text-center">{{ auth()->user()->name }}</h2>
        <p class="text-gray-500 text-xs md:text-sm text-center break-all px-2">{{ auth()->user()->email }}</p>
    </div>

    {{-- Menu Sidebar --}}
    <nav class="space-y-2 md:space-y-4">

        {{-- Profil Saya --}}
        <a href="{{ route('profile.index') }}"
           class="flex items-center justify-between gap-2 md:gap-3 px-3 md:px-4 py-2 md:py-3 rounded-lg text-sm md:text-base {{ request()->routeIs('profile.index') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100' }}">
            <div class="flex items-center gap-2 md:gap-3">
                <i class="fas fa-user text-base md:text-lg"></i>
                <span class="whitespace-nowrap">Profil Saya</span>
            </div>
        </a>

        {{-- Pesanan Pending --}}
        <a href="{{ route('profile.orders.pending') }}"
           class="flex items-center justify-between gap-2 md:gap-3 px-3 md:px-4 py-2 md:py-3 rounded-lg text-sm md:text-base {{ request()->routeIs('profile.orders.pending') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100' }}">
            <div class="flex items-center gap-2 md:gap-3 flex-1 min-w-0">
                <i class="far fa-clock text-base md:text-lg flex-shrink-0"></i>
                <span class="truncate">Pesanan Pending</span>
            </div>
            @if(isset($pendingCount) && $pendingCount > 0)
                <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded-full flex-shrink-0">{{ $pendingCount }}</span>
            @endif
        </a>

        {{-- Sedang Disewa --}}
        <a href="{{ route('profile.orders.renting') }}"
           class="flex items-center justify-between gap-2 md:gap-3 px-3 md:px-4 py-2 md:py-3 rounded-lg text-sm md:text-base {{ request()->routeIs('profile.orders.renting') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100' }}">
            <div class="flex items-center gap-2 md:gap-3 flex-1 min-w-0">
                <i class="fas fa-box-open text-base md:text-lg flex-shrink-0"></i>
                <span class="truncate">Sedang Disewa</span>
            </div>
            @if(isset($rentingCount) && $rentingCount > 0)
                <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full flex-shrink-0">{{ $rentingCount }}</span>
            @endif
        </a>

        {{-- Pesanan Selesai --}}
        <a href="{{ route('profile.orders.completed') }}"
           class="flex items-center justify-between gap-2 md:gap-3 px-3 md:px-4 py-2 md:py-3 rounded-lg text-sm md:text-base {{ request()->routeIs('profile.orders.completed') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100' }}">
            <div class="flex items-center gap-2 md:gap-3 flex-1 min-w-0">
                <i class="fas fa-check-circle text-base md:text-lg flex-shrink-0"></i>
                <span class="truncate">Pesanan Selesai</span>
            </div>
            @if(isset($completedCount) && $completedCount > 0)
                <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full flex-shrink-0">{{ $completedCount }}</span>
            @endif
        </a>

        {{-- Pesanan Dibatalkan/Gagal --}}
        <a href="{{ route('profile.orders.cancelled') }}"
           class="flex items-center justify-between gap-2 md:gap-3 px-3 md:px-4 py-2 md:py-3 rounded-lg text-sm md:text-base {{ request()->routeIs('profile.orders.cancelled') ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100' }}">
            <div class="flex items-center gap-2 md:gap-3 flex-1 min-w-0">
                <i class="fas fa-times-circle text-base md:text-lg flex-shrink-0"></i>
                <span class="truncate md:whitespace-normal">Pesanan Dibatalkan/Gagal</span>
            </div>
            @if(isset($cancelledCount) && $cancelledCount > 0)
                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full flex-shrink-0">{{ $cancelledCount }}</span>
            @endif
        </a>

    </nav>

</div>