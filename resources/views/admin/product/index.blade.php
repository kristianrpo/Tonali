@extends('layouts.app')
@section('content')
<div class="row">
    @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="{{ asset('storage/products/'.$product->getImage()) }}" class="card-img-top">
                <div class="card-body text-center">
                    <a href="{{ route('admin.product.show', ['id'=> $product->getId()]) }}">{{ $product->getName() }}</a>
            </div>
        </div>
    @endforeach
</div>
@endsection