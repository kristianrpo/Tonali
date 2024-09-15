@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4">
    <div class="row justify-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('product.edit_product') }}</div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">{{ __('product.select_file') }}</label>
                                <div class="flex items-center mt-2">
                                    <label class="cursor-pointer bg-brightPink text-white px-4 py-2 rounded-md hover:bg-black">
                                        {{ __('product.select_file') }}
                                        <input type="file" class="hidden" id="image" name="image">
                                    </label>
                                    <p id="file-name" class="ml-4 text-gray-500" data-nofile="{{ __('product.no_file_selected') }}">{{ __('product.no_file_selected') }}</p>
                                </div>
                            </div>

                            <input name="name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.enter_name') }}">
                            <input name="price" value="{{ $viewData['product']->getPrice() }}" type="text" class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-pbrightPink" placeholder="{{ __('product.enter_price') }}">
                            <input name="description" value="{{ $viewData['product']->getDescription() }}" type="text" class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.enter_description') }}">
                            <input name="brand" value="{{ $viewData['product']->getBrand() }}" type="text" class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.enter_brand') }}">
                            <input name="stock_quantity" value="{{ $viewData['product']->getStockQuantity() }}" type="text" class="form-control mb-2 border border-gray-300 rounded-md p-2 w-full focus:ring-1 focus:ring-brightPink focus:border-brightPink" placeholder="{{ __('product.enter_stock_quantity') }}">

                            <button type="submit" class="bg-brightPink text-white px-4 py-2 rounded-md hover:bg-black">{{ __('product.edit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/product.js') }}"></script>
@endsection
