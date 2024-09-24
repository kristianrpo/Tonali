@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{ __("product.recommended") }}</h1>

  @if(!$viewData['colorimetry'])
  <p>{{ __("colorimetry.without_colorimetry") }}</p>
  <a href="{{ route('colorimetry.create') }}" class="bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
    {{ __("user.create_colorimetry") }}
  </a>
  @else
  @if(isset($viewData['recommendation']) && $viewData['recommendation']->count() > 0)
  <h2>{{ __("product.recommended") }}</h2>
  <div
    class="mb-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach($viewData['recommendation'] as $product)
    <div
      class="rounded-lg border border-gray-200 bg-white shadow-sm">
      <a
        href="{{ route("product.show", ["id" => $product->getId()]) }}">
        <img
          class="h-60 w-full object-cover"
          src="{{ $product->getImageUrl() }}"
          alt="{{ $product->getName() }}" />
      </a>
      <div class="m-6">
        <a
          href="{{ route("product.show", ["id" => $product->getId()]) }}"
          class="mt-1 text-lg font-semibold leading-tight text-gray-900 hover:underline">
          {{ $product->getName() }}
        </a>

        <div class="mt-2 flex items-center gap-2">
          <div class="flex items-center">
            @for ($i = 1; $i <= 5; $i++)
              <svg
              class="{{ $i <= $product->getAverageRating() ? "text-yellow-300" : "text-gray-300" }} h-6 w-6"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20">
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
              </svg>
              @endfor
          </div>
          <p class="text-sm font-medium text-gray-900">
            {{ $product->getAverageRating() }}
          </p>
          <p class="text-sm font-medium text-gray-500">
            ({{ $product->getQuantityReviews() }})
          </p>
        </div>

        <p class="mt-2 text-gray-500">
          {{ $product->getBrand() }}
        </p>

        <p class="mt-2 text-gray-500">
          {{ formatPrice($product->getPrice()) }}
        </p>

        <form
          action="{{ route("cart.add", ["id" => $product->getId()]) }}"
          method="POST">
          @csrf
          <button
            class="mt-2 flex items-center space-x-2 rounded bg-brightPink px-3 py-1 text-sm text-white hover:bg-black hover:text-white">
            <svg
              class="h-6 w-6 text-white"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24">
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
            </svg>
            {{ __("product.add_to_cart") }}
          </button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <p>{{ __("colorimetry.without_colorimetry") }}</p>
  <a href="{{ route('colorimetry.create') }}" class="bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
    {{ __("user.create_colorimetry") }}
  </a>
  @endif
  @endif
</div>
@endsection