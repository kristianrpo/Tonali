@extends("layouts.admin")
@section("title", __("product.edit_product"))
@section("content")
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <x-alert :message="$error" color="bg-red-500" />
    @endforeach
  @endif

  <div class="bottom-0 mx-auto max-w-screen-xl px-4 lg:px-12">
    <h1 class="mb-4 text-3xl font-bold text-gray-800">
      {{ __("product.edit_product") }}
    </h1>

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
            <input type="file" class="hidden" id="image" name="image" />
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
            name="category_id"
            {{-- Añade el atributo "name" para que el valor sea enviado en el formulario --}}
            class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
          >
            <option
              value="{{ $viewData["product"]->getCategory()->getId() }}"
              selected
            >
              {{ $viewData["product"]->getCategory()->getName() }}
            </option>
            @foreach ($viewData["categories"] as $category)
              @if ($category->getId() != $viewData["product"]->getCategory()->getId())
                <option
                  value="{{ $category->getId() }}"
                  {{ old("category_id") == $category->getId() ? "selected" : "" }}
                >
                  {{ $category->getName() }}
                </option>
              @endif
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
        class="mt-4 flex rounded-md bg-brightPink px-4 py-2 text-white hover:bg-black"
      >
        <svg
          class="h-6 w-6 text-white"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="none"
          viewBox="0 0 24 24"
        >
          <path
            stroke="white"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"
          />
        </svg>
        {{ __("product.edit") }}
      </button>
    </form>
  </div>

  <script src="{{ asset("js/product/loadImage.js") }}"></script>
@endsection
