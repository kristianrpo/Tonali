@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit product</div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('admin.product.update',  ['id'=> $viewData['product']->getId()]) }}"  enctype="multipart/form-data">
                            @csrf
                            
                            @method('PUT')

                            <input type="file" class="form-control mb-2" name="image" />
                            <input name="name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control">  
                            <input name="price" value="{{ $viewData['product']->getPrice() }}" type="text" class="form-control">
                            <input name="description" value="{{ $viewData['product']->getDescription() }}" type="text" class="form-control">
                            <input name="brand" value="{{ $viewData['product']->getBrand() }}" type="text" class="form-control">                                           
                            <input type="submit" class="btn btn-primary" value="Edit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection