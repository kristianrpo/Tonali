@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="{{ $viewData['product']->getImageUrl() }}" class="img-fluid rounded-start w-75"
                        alt="{{ $viewData['product']->getName() }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $viewData['product']->getName() }}</h5>
                        <p class="card-text"><strong>{{ __('product.price') }}:</strong>
                            {{ formatPrice($viewData['product']->getPrice()) }}</p>
                        <p class="card-text"><strong>{{ __('product.description') }}:</strong>
                            {{ $viewData['product']->getDescription() }}</p>
                        <p class="card-text"><strong>{{ __('product.brand') }}:</strong>
                            {{ $viewData['product']->getBrand() }}</p>
                        <p class="card-text"><strong>{{ __('product.stock_quantity') }}:</strong>
                            {{ $viewData['product']->getStockQuantity() }}</p>
                        <p class="card-text"><strong>{{ __('product.created_at') }}:</strong>
                            {{ $viewData['product']->getCreatedAt() }}</p>
                        <p class="card-text"><strong>{{ __('product.updated_at') }}:</strong>
                            {{ $viewData['product']->getUpdatedAt() }}</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.product.edit', ['id' => $viewData['product']->getId()]) }}"
                                class="btn btn-primary">{{ __('product.edit') }}</a>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <form action="{{ route('admin.product.delete', $viewData['product']->getId()) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('product.delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
