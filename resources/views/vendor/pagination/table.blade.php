{{-- resources/views/vendor/pagination/custom.blade.php --}}
@if ($paginator->hasPages())
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing
            {{ $paginator->firstItem() }}
            -
            {{ $paginator->lastItem() }}
            of
            {{ $paginator->total() }}
        </span>
        <span class="col-span-2"></span>
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li>
                            <span class="px-3 py-1 rounded-md rounded-l-lg opacity-50 cursor-not-allowed">
                                <svg class="w-4 h-4" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" />
                                </svg>
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}"
                                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none">
                                <svg class="w-4 h-4" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" />
                                </svg>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- Dots --}}
                        @if (is_string($element))
                            <li><span class="px-3 py-1">{{ $element }}</span></li>
                        @endif

                        {{-- Array of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li><span
                                            class="px-3 py-1 text-white bg-purple-600 border border-purple-600 rounded-md">{{ $page }}</span>
                                    </li>
                                @else
                                    <li><a href="{{ $url }}"
                                            class="px-3 py-1 rounded-md">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}"
                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none">
                                <svg class="w-4 h-4" viewBox="0 0 20 20">
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" />
                                </svg>
                            </a>
                        </li>
                    @else
                        <li>
                            <span class="px-3 py-1 rounded-md rounded-r-lg opacity-50 cursor-not-allowed">
                                <svg class="w-4 h-4" viewBox="0 0 20 20">
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" />
                                </svg>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </span>
    </div>
@endif
