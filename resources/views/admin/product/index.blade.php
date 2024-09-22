@extends("layouts.admin")
@section("content")
    @if (session("success"))
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
                            {{ session("success") }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

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

    <section class="bg-gray-50 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <h2 class="mb-6 text-3xl font-bold text-gray-800">
                {{ __("product.my_products") }}
            </h2>
            <div
                class="relative overflow-hidden bg-white shadow-md sm:rounded-lg"
            >
                <div
                    class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0"
                >
                    <div class="w-full md:w-2/3">
                        <form
                            action="{{ route("admin.product.search") }}"
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
                                        viewbox="0 0 20 20"
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
                                />
                            </div>
                        </form>
                    </div>
                    <div
                        class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0"
                    >
                        <a
                            href="{{ route("admin.product.create") }}"
                            class="hover:bg-primary-800 focus:ring-primary-300 flex items-center justify-center rounded-lg bg-brightPink px-4 py-2 text-sm font-medium text-white hover:bg-black focus:outline-none focus:ring-4"
                        >
                            <svg
                                class="mr-2 h-3.5 w-3.5"
                                fill="currentColor"
                                viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    clip-rule="evenodd"
                                    fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                />
                            </svg>
                            {{ __("product.add_product") }}
                        </a>

                        <div
                            class="flex w-full items-center space-x-3 md:w-auto"
                        >
                            <button
                                id="filterDropdownButton"
                                data-dropdown-toggle="filterDropdown"
                                class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 md:w-auto"
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
                                    href="{{ route("admin.product.index") }}"
                                    class="mb-4 block font-medium text-brightPink hover:text-black"
                                >
                                    Clear all
                                </a>

                                <form
                                    action="{{ route("admin.product.filter") }}"
                                    method="GET"
                                >
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
                                    <div
                                        id="categoryDropdown"
                                        class="hidden space-y-2 text-sm"
                                    >
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
                                                    <label
                                                        for="category_{{ $category->getId() }}"
                                                    >
                                                        {{ $category->getName() }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <button
                                        id="stockQuantityDropdownButton"
                                        type="button"
                                        class="hover:text-primary-700 mb-1 mt-3 flex w-full items-center justify-between rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none"
                                    >
                                        {{ __("product.stock_quantity") }}
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

                                    <div
                                        id="stockQuantityDropdown"
                                        class="hidden space-y-2 text-sm"
                                    >
                                        <ul>
                                            <li>
                                                <input
                                                    type="checkbox"
                                                    id="stock_quantity_in_stock"
                                                    name="stock_quantity[]"
                                                    value="in_stock"
                                                    class="mr-2 rounded focus:ring-brightPink"
                                                />
                                                <label
                                                    for="stock_quantity_in_stock"
                                                >
                                                    {{ __("product.in_stock") }}
                                                </label>
                                            </li>
                                            <li>
                                                <input
                                                    type="checkbox"
                                                    id="stock_quantity_out_of_stock"
                                                    name="stock_quantity[]"
                                                    value="out_of_stock"
                                                    class="mr-2 rounded focus:ring-brightPink"
                                                />
                                                <label
                                                    for="stock_quantity_out_of_stock"
                                                >
                                                    {{ __("product.out_of_stock") }}
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
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead
                            class="bg-gray-50 text-xs uppercase text-gray-700"
                        >
                            <tr>
                                <th scope="col" class="px-4 py-4">
                                    {{ __("product.product") }}
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    {{ __("product.inventory") }}
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    {{ __("product.category") }}
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    {{ __("product.brand") }}
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    {{ __("product.price") }}
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">
                                        {{ __("product.details") }}
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData["products"] as $product)
                                <tr class="border-b">
                                    <th
                                        scope="row"
                                        class="whitespace-nowrap px-4 py-3 font-medium text-black"
                                    >
                                        <div class="mr-3 flex items-center">
                                            <img
                                                src="{{ $product->getImageUrl() }}"
                                                alt="{{ $product->getName() }}"
                                                class="mr-3 h-9 w-9 rounded-full object-cover"
                                            />
                                            {{ $product->getName() }}
                                        </div>
                                    </th>
                                    <td class="px-4 py-3">
                                        {{ $product->getInventory() }}
                                    </td>
                                    <td
                                        class="inline-block rounded-full bg-gray-200 px-3 py-1 text-black"
                                    >
                                        {{ $product->getCategory()->getName() }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $product->getBrand() }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ formatPrice($product->getPrice()) }}
                                    </td>
                                    <td
                                        class="flex items-center justify-end px-4 py-3"
                                    >
                                        <a
                                            href="{{ route("admin.product.show", ["id" => $product->getId()]) }}"
                                            class="inline-flex items-center rounded-lg p-1.5 text-center text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 focus:outline-none"
                                        >
                                            <svg
                                                class="h-6 w-6 text-brightPink"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke="#ec3f70"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"
                                                />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <x-pagination :paginator="$viewData['products']" />
            </div>
        </div>
    </section>
    <script src="{{ asset("js/product/filter.js") }}"></script>
@endsection
