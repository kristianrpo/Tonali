<div class="row">
    @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="{{ asset('storage/products/'.$product->getImage()) }}" class="card-img-top">
                <div class="card-body text-center">
                    <a href=""
                    class="btn bg-primary text-white">{{ $product->getName() }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>