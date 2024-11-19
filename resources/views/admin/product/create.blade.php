@extends("layouts.admin")
@section("title", __("product.create_product"))
@section("content")
  @if (session("success"))
    <x-alert :message="session('success')" color="bg-green-500" />
  @endif

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <x-alert :message="$error" color="bg-red-500" />
    @endforeach
  @endif

  <div class="bottom-0 mx-auto max-w-screen-xl px-4 lg:px-12">
    <h1 class="mb-4 text-3xl font-bold text-gray-800">
      {{ __("product.create_product") }}
    </h1>

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
