@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-4 w-4/5">
  <nav class="text-gray-500 mb-4">
    <ol class="list-reset flex">
      <li><a href="#" class="text-gray-600 hover:text-gray-900">Home</a></li>
      <li><span class="mx-2">/</span></li>
      <li><a href="#" class="text-gray-600 hover:text-gray-900">Makeup</a></li>
      <li><span class="mx-2">/</span></li>
      <li class="text-gray-700">Category</li>
    </ol>
  </nav>

  <h1 class="text-3xl font-bold text-gray-800 mb-4">Products</h1>

  <div class="mb-6 flex space-x-4">
    <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300">All</button>
  </div>

  <div class="container mx-auto px-4 py-2">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($viewData["products"] as $product)
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <img class="object-cover w-full h-48" src="{{ asset('storage/products/'.$product->getImage()) }}" alt="Product Image">
            <div class="p-4 text-center">
                <h2 class="text-gray-800 font-semibold">{{ $product->getName() }}</h2>
                <p class="text-gray-600 text-sm">{{ $product->getBrand() }}</p>
                <p class="text-gray-600 text-sm">$ {{ $product->getPrice() }}</p>
                <button class="bg-brightPink text-white text-sm hover:bg-black hover:text-white px-3 py-1 rounded mt-2">
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection