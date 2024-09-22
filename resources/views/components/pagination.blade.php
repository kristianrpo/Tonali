<nav
    class="flex flex-col items-start justify-between space-y-3 p-4 md:flex-row md:items-center md:space-y-0"
    aria-label="Table navigation"
>
    <span class="text-sm font-normal text-gray-500">
        {{ __("pagination.showing") }}
        <span class="font-semibold text-gray-900">
            {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}
        </span>
        {{ __("pagination.of") }}
        <span class="font-semibold text-gray-900">
            {{ $paginator->total() }}
        </span>
    </span>

    <ul
        class="inline-flex items-stretch -space-x-px text-sm font-normal text-gray-500"
    >
        <li>
            @if ($paginator->onFirstPage())
                <span
                    class="ml-0 flex h-full cursor-not-allowed items-center justify-center rounded-l-lg border border-gray-300 bg-white px-3 py-1.5"
                >
                    <svg
                        class="h-5 w-5"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </span>
            @else
                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    class="ml-0 flex h-full items-center justify-center rounded-l-lg border border-gray-300 bg-white px-3 py-1.5 hover:bg-gray-100 hover:text-gray-700"
                >
                    <svg
                        class="h-5 w-5"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
            @endif
        </li>

        <li
            class="flex h-full items-center justify-center px-3 py-1.5 text-gray-700"
        >
            {{ __("pagination.page") }} {{ $paginator->currentPage() }}
            {{ __("pagination.of") }} {{ $paginator->lastPage() }}
        </li>

        <li>
            @if ($paginator->hasMorePages())
                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    class="flex h-full items-center justify-center rounded-r-lg border border-gray-300 bg-white px-3 py-1.5 leading-tight hover:bg-gray-100 hover:text-gray-700"
                >
                    <svg
                        class="h-5 w-5"
                        aria-hidden="true"
                        fill="currentColor"
                        viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
            @else
                <span
                    class="flex h-full cursor-not-allowed items-center justify-center rounded-r-lg border border-gray-300 bg-white px-3 py-1.5"
                >
                    <svg
                        class="h-5 w-5"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </span>
            @endif
        </li>
    </ul>
</nav>
