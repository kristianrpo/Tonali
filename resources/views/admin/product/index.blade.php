@extends("layouts.admin")
@section("title", __("product.my_products"))
@section("content")
    @if (session("success"))
        <x-alert :message="session('success')" />
    @endif

    @if (session("error"))
        <x-alert :message="session('error')" />
    @endif

    <section class="antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <h1 class="mb-6 text-3xl font-bold text-gray-800">
                {{ __("product.my_products") }}
            </h1>
            <div
                class="relative overflow-hidden bg-white shadow-md sm:rounded-lg"
            >
                <div
                    class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0"
                >
                    <div class="w-full md:w-2/3">
                        <x-search :route="route('admin.product.index')" />
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
                        <x-productFilter
                            :categories="$viewData['categories']"
                            :priceRanges="$viewData['priceRanges']"
                            :route="route('admin.product.index')"
                        />
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
                                        @if ($product->getStockQuantity() > 0)
                                            {{ __("product.in_stock") }}: {{ $product->getStockQuantity() }}
                                        @else
                                            {{ __("product.out_of_stock") }}
                                        @endif
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
    <script src="{{ asset("js/product/suggestions.js") }}"></script>
@endsection
