@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <div class="row justify-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-3xl font-bold text-gray-800">{{ __('product.create_product') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data"
                            class="space-y-4">
                            @csrf

                            <div>
                    
                                <div class="flex items-center mt-2">
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

                            <input type="text"
                                class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink"
                                placeholder="{{ __('product.enter_name') }}" name="name" value="{{ old('name') }}" />
                            <input type="number"
                                class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink"
                                placeholder="{{ __('product.enter_price') }}" name="price" value="{{ old('price') }}" />
                            <input type="text"
                                class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink"
                                placeholder="{{ __('product.enter_description') }}" name="description"
                                value="{{ old('description') }}" />
                            <input type="text"
                                class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink"
                                placeholder="{{ __('product.enter_brand') }}" name="brand"
                                value="{{ old('brand') }}" />
                            <input type="number"
                                class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink"
                                placeholder="{{ __('product.enter_stock_quantity') }}" name="stock_quantity"
                                value="{{ old('stock_quantity') }}" />

                            <button type="submit"
                                class=" bg-brightPink text-white px-4 py-2 rounded-md hover:bg-black">{{ __('product.send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/product/loadImage.js') }}"></script>
@endsection
