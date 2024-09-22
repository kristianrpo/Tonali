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

    <div class="bottom-0 mx-auto max-w-screen-xl px-4 lg:px-12">
        <h2 class="mb-4 text-3xl font-bold text-gray-800">
            {{ __("product.create_product") }}
        </h2>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" />
            @endforeach
        @endif

        <form
            method="POST"
            action="{{ route("admin.product.store") }}"
            enctype="multipart/form-data"
        >
            @csrf
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
                        type="text"
                        name="name"
                        id="name"
                        class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.name") }}"
                        value="{{ old("name") }}"
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
                        type="number"
                        name="price"
                        id="price"
                        class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.enter_price") }}"
                        value="{{ old("price") }}"
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
                        type="text"
                        name="brand"
                        id="brand"
                        class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.enter_brand") }}"
                        value="{{ old("brand") }}"
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
                        id="category_id"
                        name="category_id"
                        class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                    >
                        <option selected="">
                            {{ __("product.select_category") }}
                        </option>
                        @foreach ($viewData["categories"] as $category)
                            <option
                                value="{{ $category->getId() }}"
                                {{ old("category_id") == $category->getId() ? "selected" : "" }}
                            >
                                {{ $category->getName() }}
                            </option>
                        @endforeach
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
                        type="number"
                        name="stock_quantity"
                        id="stock_quantity"
                        class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
                        placeholder="{{ __("product.enter_stock_quantity") }}"
                        value="{{ old("stock_quantity") }}"
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
{{ old("description") }}</textarea
                    >
                </div>
            </div>

            <button
                type="submit"
                class="mt-4 rounded-md bg-brightPink px-4 py-2 text-white hover:bg-black"
            >
                {{ __("product.send") }}
            </button>
        </form>
    </div>

    <script src="{{ asset("js/product/loadImage.js") }}"></script>
@endsection
