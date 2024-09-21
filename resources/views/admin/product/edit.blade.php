@extends("layouts.admin")
@section("content")
    <div class="bottom-0 mx-auto max-w-screen-xl px-4 lg:px-12">
        <h2 class="mb-4 text-3xl font-bold text-gray-800">
            {{ __("product.edit_product") }}
        </h2>
        @if ($errors->any())
            <ul
                id="errors"
                class="alert alert-danger relative mb-2 list-none rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700"
            >
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form
            method="POST"
            action="{{ route("admin.product.update", ["id" => $viewData["product"]->getId()]) }}"
            enctype="multipart/form-data"
        >
            @csrf
            @method("PUT")
            <div>
                <div class="mb-3 flex items-center">
                    <label
                        class="cursor-pointer rounded-md bg-brightPink px-4 py-2 text-white hover:bg-black"
                    >
                        {{ __("product.select_file") }}
                        <input
                            type="file"
                            class="hidden"
                            id="image"
                            name="image"
                        />
                    </label>
                    <p
                        id="file-name"
                        class="ml-4 text-gray-500"
                        data-nofile="{{ __("product.no_file_selected") }}"
                    >
                        {{ __("product.no_file_selected") }}
                    </p>
                </div>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label
                        for="name"
                        class="mb-1 block text-sm font-medium text-gray-900"
                    >
                        {{ __("product.name") }}
                    </label>
                    <input
                        name="name"
                        value="{{ $viewData["product"]->getName() }}"
                        type="text"
                        class="form-control mb-2 w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.enter_name") }}"
                        required=""
                    />
                </div>

                <div>
                    <label
                        for="price"
                        class="mb-1 block text-sm font-medium text-gray-900"
                    >
                        {{ __("product.price") }}
                    </label>
                    <input
                        name="price"
                        value="{{ $viewData["product"]->getPrice() }}"
                        type="text"
                        class="form-control focus:border-pbrightPink mb-2 w-full rounded-md border border-gray-300 p-2 focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.enter_price") }}"
                        required=""
                    />
                </div>

                <div>
                    <label
                        for="brand"
                        class="mb-1 block text-sm font-medium text-gray-900"
                    >
                        {{ __("product.brand") }}
                    </label>
                    <input
                        name="brand"
                        value="{{ $viewData["product"]->getBrand() }}"
                        type="text"
                        class="form-control mb-2 w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.enter_brand") }}"
                        required=""
                    />
                </div>

                <div>
                    <label
                        for="category"
                        class="mb-1 block text-sm font-medium text-gray-900"
                    >
                        {{ __("product.category") }}
                    </label>
                    <select
                        id="category"
                        class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                    >
                        <option selected="">
                            {{ __("product.category") }}
                        </option>
                    </select>
                </div>

                <div>
                    <label
                        for="stock_quantity"
                        class="mb-1 block text-sm font-medium text-gray-900"
                    >
                        {{ __("product.stock_quantity") }}
                    </label>
                    <input
                        name="stock_quantity"
                        value="{{ $viewData["product"]->getStockQuantity() }}"
                        type="text"
                        class="form-control mb-2 w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.enter_stock_quantity") }}"
                        required=""
                    />
                </div>

                <div class="sm:col-span-2">
                    <label
                        for="description"
                        class="mb-1 block text-sm font-medium text-gray-900"
                    >
                        {{ __("product.description") }}
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        rows="2"
                        class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.enter_description") }}"
                        required=""
                    >
{{ $viewData["product"]->getDescription() }}</textarea
                    >
                </div>
            </div>
            <button
                type="submit"
                class="mt-4 rounded-md bg-brightPink px-4 py-2 text-white hover:bg-black"
            >
                {{ __("product.edit") }}
            </button>
        </form>
    </div>

    <script src="{{ asset("js/product/loadImage.js") }}"></script>
@endsection
