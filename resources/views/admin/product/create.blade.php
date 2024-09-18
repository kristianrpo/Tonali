@extends('layouts.admin')
@section('admin-content')
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12 bottom-0">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ __('product.create_product') }}</h2>
        @if ($errors->any())
            <ul id="errors" class="alert alert-danger list-none bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
            <div>    
                <div class="flex items-center mb-3">
                    <label
                        class="cursor-pointer bg-brightPink text-white px-4 py-2 rounded-md hover:bg-black">
                        {{ __('product.select_file') }}
                        <input type="file" class="hidden" id="image" name="image">
                    </label>
                    <p id="file-name" class="ml-4 text-gray-500"
                    data-nofile="{{ __('product.no_file_selected') }}">
                    {{ __('product.no_file_selected') }}</p>
                </div>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm mb-1 font-medium text-gray-900 dark:text-white">{{ __('product.name') }}</label>
                    <input type="text" name="name" id="name" class="form-control border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.name') }}" value="{{ old('name') }}" required="">
                </div>          
                
                <div>
                    <label for="price" class="block text-sm mb-1 font-medium text-gray-900 dark:text-white">{{ __('product.price') }}</label>
                    <input type="number" name="price" id="price" class="form-control border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.enter_price') }}" value="{{ old('price') }}" required="">
                </div>

                <div>
                    <label for="brand" class="block text-sm mb-1 font-medium text-gray-900 dark:text-white">{{ __('product.brand') }}</label>
                    <input type="text" name="brand" id="brand" class="form-control border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.enter_brand') }}" value="{{ old('brand') }}" required="">
                </div>

                <div>
                    <label for="category" class="block text-sm mb-1 font-medium text-gray-900 dark:text-white">{{ __('product.category') }}</label>
                    <select id="category" class="form-control border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink">
                        <option selected="">{{ __('product.select_category') }}</option>
                    </select>
                </div>

                <div>
                    <label for="stock_quantity" class="block text-sm mb-1 font-medium text-gray-900 dark:text-white">{{ __('product.stock_quantity') }}</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" class="form-control border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.enter_stock_quantity') }}" value="{{ old('stock_quantity') }}" required="">
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm mb-1 font-medium text-gray-900 dark:text-white">{{ __('product.description') }}</label>
                    <textarea name="description" id="description" rows="2" class="form-control border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.enter_description') }}" required="">{{ old('description') }}</textarea>
                </div>
            </div>

            <button type="submit" class="bg-brightPink text-white px-4 py-2 rounded-md hover:bg-black mt-4">{{ __('product.send') }}</button>
        </form>
    </div>

    <script src="{{ asset('js/product/loadImage.js') }}"></script>
@endsection
