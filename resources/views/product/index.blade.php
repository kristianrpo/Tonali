@extends("layouts.app")
@section("content")
    @if (session("message"))
        <div class="mb-10 flex justify-center">
            <div
                class="w-3/4 rounded-b bg-palePink px-4 py-3 text-offWhite shadow-md"
                role="alert"
            >
                <div class="flex">
                    <div class="mx-5 py-1">
                        <svg
                            class="mr-4 h-6 w-6 fill-white"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                            />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">
                            {{ __("product.notification") }}
                        </p>
                        <p class="text-sm">
                            {{ session("message") }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mx-auto w-4/5">
        <h1 class="mb-4 text-3xl font-bold text-gray-800">
            {{ __("product.products") }}
        </h1>
        <button
            id="filterDropdownButton"
            data-dropdown-toggle="filterDropdown"
            class="hover:text-primary-700 mb-3 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 md:w-auto"
            type="button"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
                class="mr-2 h-4 w-4 text-gray-400"
                viewbox="0 0 20 20"
                fill="currentColor"
            >
                <path
                    fill-rule="evenodd"
                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                    clip-rule="evenodd"
                />
            </svg>
            {{ __("product.filter") }}
            <svg
                class="-mr-1 ml-1.5 h-5 w-5"
                fill="currentColor"
                viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
            >
                <path
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                />
            </svg>
        </button>

        <div
            id="filterDropdown"
            class="z-10 hidden w-64 rounded-lg bg-white p-3 shadow-lg"
        >
            <a
                href="{{ route("product.index") }}"
                class="mb-4 block font-medium text-brightPink hover:text-black"
            >
                Clear all
            </a>

            <form action="{{ route("product.filter") }}" method="GET">
                <button
                    id="categoryDropdownButton"
                    type="button"
                    class="hover:text-primary-700 mb-1 mt-3 flex w-full items-center justify-between rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none"
                >
                    {{ __("product.category") }}
                    <svg
                        class="ml-2 h-5 w-5"
                        fill="currentColor"
                        viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
                <div id="categoryDropdown" class="hidden space-y-2 text-sm">
                    <ul>
                        @foreach ($viewData["categories"] as $category)
                            <li>
                                <input
                                    type="checkbox"
                                    id="category_{{ $category->getId() }}"
                                    name="category_id[]"
                                    value="{{ $category->getId() }}"
                                    class="mr-2 rounded focus:ring-brightPink"
                                />
                                <label for="category_{{ $category->getId() }}">
                                    {{ $category->getName() }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <button
                    id="ratingDropdownButton"
                    type="button"
                    class="hover:text-primary-700 mb-1 mt-3 flex w-full items-center justify-between rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none"
                >
                    {{ __("product.rating") }}
                    <svg
                        class="ml-2 h-5 w-5"
                        fill="currentColor"
                        viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
                <div id="ratingDropdown" class="hidden space-y-2 text-sm">
                    <ul class="space-y-2">
                        @foreach (range(5, 1) as $rating)
                            <li class="flex items-center">
                                <input
                                    type="checkbox"
                                    id="rating_{{ $rating }}"
                                    name="rating[]"
                                    value="{{ $rating }}"
                                    class="mr-2 rounded focus:ring-brightPink"
                                />
                                <label
                                    for="rating_{{ $rating }}"
                                    class="flex items-center space-x-1"
                                >
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg
                                            class="{{ $i <= $rating ? "text-yellow-300" : "text-gray-300" }} h-4 w-4"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                            />
                                        </svg>
                                    @endfor
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <button
                    id="priceDropdownButton"
                    type="button"
                    class="hover:text-primary-700 mb-1 mt-3 flex w-full items-center justify-between rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none"
                >
                    {{ __("product.price") }}
                    <svg
                        class="ml-2 h-5 w-5"
                        fill="currentColor"
                        viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
                <div id="priceDropdown" class="hidden space-y-2 text-sm">
                    <ul>
                        <li>
                            <input
                                type="checkbox"
                                id="price_low"
                                name="price_range[]"
                                value="{{ $viewData["priceRanges"]["min"] }}-{{ $viewData["priceRanges"]["first_tercile"] }}"
                                class="mr-2 rounded focus:ring-brightPink"
                            />
                            <label for="price_low">
                                {{ formatPrice($viewData["priceRanges"]["min"], 2) }}
                                to
                                {{ formatPrice($viewData["priceRanges"]["first_tercile"], 2) }}
                            </label>
                        </li>
                        <li>
                            <input
                                type="checkbox"
                                id="price_mid"
                                name="price_range[]"
                                value="{{ $viewData["priceRanges"]["first_tercile"] }}-{{ $viewData["priceRanges"]["second_tercile"] }}"
                                class="mr-2 rounded focus:ring-brightPink"
                            />
                            <label for="price_mid">
                                {{ formatPrice($viewData["priceRanges"]["first_tercile"], 2) }}
                                to
                                {{ formatPrice($viewData["priceRanges"]["second_tercile"], 2) }}
                            </label>
                        </li>
                        <li>
                            <input
                                type="checkbox"
                                id="price_high"
                                name="price_range[]"
                                value="{{ $viewData["priceRanges"]["second_tercile"] }}-{{ $viewData["priceRanges"]["max"] }}"
                                class="mr-2 rounded focus:ring-brightPink"
                            />
                            <label for="price_high">
                                {{ formatPrice($viewData["priceRanges"]["second_tercile"], 2) }}
                                to
                                {{ formatPrice($viewData["priceRanges"]["max"], 2) }}
                            </label>
                        </li>
                    </ul>
                </div>

                <button
                    type="submit"
                    class="mt-4 w-full rounded bg-brightPink px-4 py-2 font-bold text-white hover:bg-black"
                >
                    {{ __("product.apply_filters") }}
                </button>
            </form>
        </div>

        <div class="mb-4 w-full">
            <form
                action="{{ route("product.search") }}"
                method="GET"
                class="flex items-center"
            >
                <label for="simple-search" class="sr-only">
                    {{ __("product.search_products") }}
                </label>
                <div class="relative w-full">
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                    >
                        <svg
                            aria-hidden="true"
                            class="h-5 w-5 text-gray-500"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="simple-search"
                        name="query"
                        class="focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900"
                        placeholder="{{ __("product.search_products") }}"
                        oninput="showSuggestions(this.value)"
                    />
                    <div
                        id="suggestions"
                        class="absolute z-50 mt-1 w-full rounded-lg border border-gray-300 bg-white shadow-lg"
                    ></div>
                </div>
            </form>
        </div>

        <div
            class="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
        >
            @foreach ($viewData["products"] as $product)
                <div
                    class="rounded-lg border border-gray-200 bg-white shadow-sm"
                >
                    <a
                        href="{{ route("product.show", ["id" => $product->getId()]) }}"
                    >
                        <img
                            class="h-60 w-full object-cover"
                            src="{{ $product->getImageUrl() }}"
                            alt="{{ $product->getName() }}"
                        />
                    </a>
                    <div class="m-6">
                        <a
                            href="{{ route("product.show", ["id" => $product->getId()]) }}"
                            class="mt-1 text-lg font-semibold leading-tight text-gray-900 hover:underline"
                        >
                            {{ $product->getName() }}
                        </a>

                        <div class="mt-2 flex items-center gap-2">
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg
                                        class="{{ $i <= $product->getAverageRating() ? "text-yellow-300" : "text-gray-300" }} h-6 w-6"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 22 20"
                                    >
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                                        />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-sm font-medium text-gray-900">
                                {{ $product->getAverageRating() }}
                            </p>
                            <p class="text-sm font-medium text-gray-500">
                                ({{ $product->getQuantityReviews() }})
                            </p>
                        </div>

                        <p class="mt-2 text-gray-500">
                            {{ $product->getBrand() }}
                        </p>

                        <p class="mt-2 text-gray-500">
                            {{ formatPrice($product->getPrice()) }}
                        </p>

                        <form
                            action="{{ route("cart.add", ["id" => $product->getId()]) }}"
                            method="POST"
                        >
                            @csrf
                            @if ($product->getStockQuantity() === 0)
                                <p
                                    class="mt-2 space-x-2 rounded bg-darkGray px-3 py-1 text-center text-sm text-white hover:bg-black hover:text-white"
                                >
                                    {{ __("product.out_of_stock") }}
                                </p>
                            @else
                                <button
                                    class="mt-2 flex items-center space-x-2 rounded bg-brightPink px-3 py-1 text-sm text-white hover:bg-black hover:text-white"
                                >
                                    <svg
                                        class="h-6 w-6 text-white"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                                        />
                                    </svg>
                                    {{ __("product.add_to_cart") }}
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset("js/product/filter.js") }}"></script>
    <script src="{{ asset("js/product/suggestions.js") }}"></script>
@endsection
