@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <img src="{{ $viewData['product']->getImageUrl() }}" class="img-fluid rounded-start w-75" alt="{{ $viewData['product']->getName() }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $viewData["product"]->getName() }}</h5>
                    <p class="card-text"><strong>Price:</strong> ${{ $viewData["product"]->getPrice() }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $viewData["product"]->getDescription() }}</p>
                    <p class="card-text"><strong>Brand:</strong> {{ $viewData["product"]->getBrand() }}</p>
                    <p class="card-text"><strong>Stock Quantity:</strong> {{ $viewData["product"]->getStockQuantity() }}</p>
                    <p class="card-text"><strong>Created At:</strong> {{ $viewData["product"]->getCreatedAt() }}</p>
                    <p class="card-text"><strong>Updated At:</strong> {{ $viewData["product"]->getUpdatedAt() }}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.product.edit', ['id'=> $viewData['product']->getId()]) }}" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <form action="{{ route('admin.product.delete', $viewData['product']->getId()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection