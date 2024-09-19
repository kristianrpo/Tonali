@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div
                    class="col-md-4 d-flex align-items-center justify-content-center"
                >
                    <img
                        src="{{ $viewData["product"]->getImageUrl() }}"
                        class="img-fluid rounded-start w-75"
                        alt="{{ $viewData["product"]->getName() }}"
                    />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $viewData["product"]->getName() }}
                        </h5>
                        <p class="card-text">
                            <strong>{{ __("product.price") }}:</strong>
                            {{ formatPrice($viewData["product"]->getPrice()) }}
                        </p>
                        <p class="card-text">
                            <strong>{{ __("product.description") }}:</strong>
                            {{ $viewData["product"]->getDescription() }}
                        </p>
                        <p class="card-text">
                            <strong>{{ __("product.brand") }}:</strong>
                            {{ $viewData["product"]->getBrand() }}
                        </p>
                        <p class="card-text">
                            <strong>
                                {{ __("product.stock_quantity") }}:
                            </strong>
                            {{ $viewData["product"]->getStockQuantity() }}
                        </p>
                        <p class="card-text">
                            <strong>{{ __("product.created_at") }}:</strong>
                            {{ $viewData["product"]->getCreatedAt() }}
                        </p>
                        <p class="card-text">
                            <strong>{{ __("product.updated_at") }}:</strong>
                            {{ $viewData["product"]->getUpdatedAt() }}
                        </p>
                        <div class="d-flex justify-content-center">
                            <a
                                href="{{ route("admin.product.edit", ["id" => $viewData["product"]->getId()]) }}"
                                class="btn btn-primary"
                            >
                                {{ __("product.edit") }}
                            </a>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <form
                                action="{{ route("admin.product.delete", $viewData["product"]->getId()) }}"
                                method="POST"
                            >
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">
                                    {{ __("product.delete") }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row w-full space-y-6 lg:space-y-0 lg:space-x-6">
      <img src="{{ $viewData['product']->getImageUrl() }}" alt="Product Image" class="mb-3 max-h-80 max-w-80 rounded-lg shadow-md">

      <div class="p-5 rounded-lg">
        <ul class="text-gray-700">
          <li class="mb-2">
            <strong class="block text-gray-900">{{ __('product.brand') }}:</strong> 
            <span class="text-gray-500">{{ $viewData['product']->getBrand() }}</span>
          </li>
          <li class="mb-2">
            <strong class="block text-gray-900">{{ __('product.category') }}:</strong> 
            <span class="text-gray-500">Category</span>
          </li>
          <li class="mb-2">
            <strong class="block text-gray-900">{{ __('product.stock_quantity') }}:</strong> 
            <span class="text-gray-500">{{ $viewData['product']->getStockQuantity() }}</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="w-full space-y-6">
      <p class="text-gray-700 text-justify">
        {{ $viewData['product']->getDescription() }}
      </p>

      <div class="flex justify-start space-x-3">
        <a href="{{ route('admin.product.edit', ['id' => $viewData['product']->getId()]) }}" class="flex items-center justify-center px-4 py-2 text-white bg-brightPink rounded-lg focus:ring-4 focus:ring-blue-300 hover:bg-black">
          <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
          </svg>
          {{ __('product.edit') }}
        </a>

        <form action="{{ route('admin.product.delete', $viewData['product']->getId()) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="flex items-center justify-center px-4 py-2 text-white bg-brightPink rounded-lg focus:ring-4 focus:ring-blue-300 hover:bg-black">
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
            </svg>
            {{ __('product.delete') }}
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection