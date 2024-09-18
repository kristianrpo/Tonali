@extends('layouts.app')
@section('content')
<section class="bg-gray-50 dark:bg-gray-900 antialiased">
  <div class="px-4 mx-auto max-w-2xl">
    <div class="w-full text-left">
      <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $viewData['product']->getName() }}</h2>
      <p class="text-xl text-gray-700 mb-2">{{ formatPrice($viewData['product']->getPrice()) }}</p>
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
    </div>
  </div>
</section>
@endsection