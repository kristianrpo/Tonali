@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create product</div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('admin.product.save') }}"  enctype="multipart/form-data">
                            @csrf
                                
                                            
                            <input type="file" class="form-control mb-2" name="image" />
                            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('description') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter brand " name="brand" value="{{ old('brand') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter stock quantity" name="stock_quantity" value="{{ old('stock_quantity') }}" />
                            <input type="submit" class="btn btn-primary" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection