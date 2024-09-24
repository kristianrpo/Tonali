<div>
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
        {{ __("productFilter.filter") }}
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
        class="z-10 hidden w-64 rounded-lg bg-white p-3 shadow-lg max-h-40 overflow-y-auto"
    >
        <a
            href="{{ $route }}"
            class="mb-4 block font-medium text-brightPink hover:text-black"
        >
            {{ __("productFilter.clear_filter") }}
        </a>

        <form action="{{ $route }}" method="GET">
            <button
                id="categoryDropdownButton"
                type="button"
                class="hover:text-primary-700 mb-1 mt-3 flex w-full items-center justify-between rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none"
            >
                {{ __("productFilter.category") }}
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
                    @foreach ($categories as $category)
                        <li>
                            <input
                                type="checkbox"
                                id="category_{{ $category->getId() }}"
                                name="category_ids[]"
                                value="{{ $category->getId() }}"
                                class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
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
                {{ __("productFilter.rating") }}
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
                <ul>
                    @foreach (range(5, 0) as $rating)
                        <li class="flex items-center">
                            <input
                                type="checkbox"
                                id="rating_{{ $rating }}"
                                name="ratings[]"
                                value="{{ $rating }}"
                                class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                            />
                            <label
                                for="rating_{{ $rating }}"
                                class="flex items-center"
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
                {{ __("productFilter.price") }}
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
                            name="price_ranges[]"
                            value="{{ $priceRanges["min"] }}-{{ $priceRanges["first_tercile"] }}"
                            class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                        />
                        <label for="price_low">
                            {{ formatPrice($priceRanges["min"]) }}
                            {{ __("productFilter.to") }}
                            {{ formatPrice($priceRanges["first_tercile"]) }}
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="price_mid"
                            name="price_ranges[]"
                            value="{{ $priceRanges["first_tercile"] }}-{{ $priceRanges["second_tercile"] }}"
                            class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                        />
                        <label for="price_mid">
                            {{ formatPrice($priceRanges["first_tercile"]) }}
                            {{ __("productFilter.to") }}
                            {{ formatPrice($priceRanges["second_tercile"]) }}
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="price_high"
                            name="price_ranges[]"
                            value="{{ $priceRanges["second_tercile"] }}-{{ $priceRanges["max"] }}"
                            class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                        />
                        <label for="price_high">
                            {{ formatPrice($priceRanges["second_tercile"]) }}
                            {{ __("productFilter.to") }}
                            {{ formatPrice($priceRanges["max"]) }}
                        </label>
                    </li>
                </ul>
            </div>

            <button
                id="stockQuantityDropdownButton"
                type="button"
                class="hover:text-primary-700 mb-1 mt-3 flex w-full items-center justify-between rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none"
            >
                {{ __("productFilter.stock_quantity") }}
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

            <div id="stockQuantityDropdown" class="hidden space-y-2 text-sm">
                <ul>
                    <li>
                        <input
                            type="checkbox"
                            id="stock_quantity_in_stock"
                            name="stock_quantities[]"
                            value="in_stock"
                            class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                        />
                        <label for="stock_quantity_in_stock">
                            {{ __("productFilter.in_stock") }}
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="stock_quantity_out_of_stock"
                            name="stock_quantities[]"
                            value="out_of_stock"
                            class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                        />
                        <label for="stock_quantity_out_of_stock">
                            {{ __("productFilter.out_of_stock") }}
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
</div>
