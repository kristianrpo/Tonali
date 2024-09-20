@extends("layouts.admin")
@section("admin-content")
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
                                    required=""
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
                                class="z-10 hidden w-56 rounded-lg bg-white p-3 shadow"
                            >
                                <h6
                                    class="mb-3 text-sm font-medium text-gray-900"
                                >
                                    {{ __("product.category") }}
                                </h6>
                                <ul
                                    class="space-y-2 text-sm"
                                    aria-labelledby="filterDropdownButton"
                                >
                                    <!-- Filtros -->
                                </ul>
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
                                        <!--getCategory()-->
                                        Category
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
                <nav
                    class="flex flex-col items-start justify-between space-y-3 p-4 md:flex-row md:items-center md:space-y-0"
                    aria-label="Table navigation"
                >
                    <span class="text-sm font-normal text-gray-500">
                        {{ __("product.showing") }}
                        <span class="font-semibold text-gray-900">
                            {{ $viewData["products"]->firstItem() }}-{{ $viewData["products"]->lastItem() }}
                        </span>
                        {{ __("product.of") }}
                        <span class="font-semibold text-gray-900">
                            {{ $viewData["products"]->total() }}
                        </span>
                    </span>

                    <ul
                        class="inline-flex items-stretch -space-x-px text-sm font-normal text-gray-500"
                    >
                        <li>
                            @if ($viewData["products"]->onFirstPage())
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
                                    href="{{ $viewData["products"]->previousPageUrl() }}"
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
                            {{ __("product.page") }}
                            {{ $viewData["products"]->currentPage() }}
                            {{ __("product.of") }}
                            {{ $viewData["products"]->lastPage() }}
                        </li>

                        <li>
                            @if ($viewData["products"]->hasMorePages())
                                <a
                                    href="{{ $viewData["products"]->nextPageUrl() }}"
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
            </div>
        </div>
    </section>
@endsection
