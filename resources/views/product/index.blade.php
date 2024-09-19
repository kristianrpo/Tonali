@extends("layouts.app")
@section("content")
    <div class="container mx-auto w-4/5">
        <h1 class="mb-4 text-3xl font-bold text-gray-800">
            {{ __("product.products") }}
        </h1>

        <div class="mb-6 flex space-x-4">
            <button
                class="rounded-full bg-gray-200 px-4 py-2 text-gray-700 hover:bg-gray-300"
            >
                {{ __("product.all") }}
            </button>
        </div>

        <div class="container mx-auto px-4 py-2">
            <div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($viewData["products"] as $product)
                    <div class="overflow-hidden rounded-lg bg-white shadow">
                        <img
                            class="h-48 w-full object-cover"
                            src="{{ $product->getImageUrl() }}"
                            alt="{{ $product->getName() }}"
                        />
                        <div class="p-4 text-center">
                            <h2 class="font-semibold text-gray-800">
                                {{ $product->getName() }}
                            </h2>
                            <p class="text-sm text-gray-600">
                                {{ $product->getBrand() }}
                            </p>
                            <p class="text-sm text-gray-600">
                                {{ formatPrice($product->getPrice()) }}
                            </p>
                            <form
                                action="{{ route("cart.add", ["id" => $product->getId()]) }}"
                                method="POST"
                            >
                                @csrf
                                <button
                                    class="mt-2 rounded bg-brightPink px-3 py-1 text-sm text-white hover:bg-black hover:text-white"
                                >
                                    {{ __("product.add_to_cart") }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
