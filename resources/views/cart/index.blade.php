@extends('layouts.app')
@section('title', __('cart.title'))
@section('content')
<section class="bg-white py-8 antialiased md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ __('cart.title') }}</h2>
        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                <div class="space-y-6">
                    @foreach($viewData['products'] as $product)
                    <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                            <div href="#" class="shrink-0 md:order-1">
                                <img class="h-20 w-20" src="{{ $product->getImageUrl() }}""
                                    alt="{{ $product->getName() }}" />
                            </div>
                            <div class="flex items-center justify-between md:order-3 md:justify-end">
                                <div class="flex items-center mr-10">
                                    <button type="button" data-id="{{ $product->getId() }}"
                                        class="decrease-quantity text-offWhite inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border bg-palePink hover:border-darkGray focus:outline-none focus:ring-2 focus:ring-gray-100">
                                        -
                                    </button>
                                    <span data-id="{{ $product->getId() }}"
                                        class=" product-quantity w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0"
                                        min="1">{{ session('products')[$product->getId()] }} </span>
                                    <button data-id="{{ $product->getId() }}" type="button"
                                        class="increase-quantity text-offWhite inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border bg-palePink hover:border-darkGray focus:outline-none focus:ring-2 focus:ring-gray-100">
                                        +
                                    </button>
                                </div>
                                <div class="text-end md:order-4 md:w-32">
                                    <p class="text-base font-bold text-gray-900">{{ formatPrice($product->getPrice()) }}</p>
                                </div>
                            </div>
                            <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                <a href="#" class="text-base font-medium text-gray-900 hover:underline"> {{
                                    $product->getName() }} </a>
                                <form action="{{ route('cart.delete', ['id'=> $product->getId()]) }}" method="POST">
                                    <div class="flex items-center gap-4">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="inline-flex items-center text-sm font-medium text-palePink hover:underline">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                            {{ __('cart.remove') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
                    <p class="text-xl font-semibold text-gray-900">{{ __('cart.order_summary') }}</p>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <table class="w-full mb-5">
                                <thead>
                                    <tr>
                                        <th class="text-center font-semibold text-gray-600">{{ __('cart.products') }}</th>
                                        <th class="text-center font-semibold text-gray-600">{{ __('cart.quantity') }}</th>
                                        <th class="text-center font-semibold text-gray-600">{{ __('cart.price') }}</th>
                                    </tr>
                                </thead>
                                @foreach($viewData['products'] as $product)
                                <tbody>
                                    <tr>
                                        <td class="text-center text-sm text-gray-700 truncate max-w-10">{{ $product->getName() }}
                                        </td>
                                        <td
                                            class="summary-quantity-{{ $product->getId() }} product-quantity text-center text-sm text-gray-700">
                                            {{ session('products')[$product->getId()] }}</td>
                                        <td class="text-sm text-center text-right text-gray-700">
                                            {{ formatPrice($product->getPrice()) }}
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>

                        <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                            <dt class="text-base font-bold text-gray-900">{{ __('cart.total') }}</dt>
                            <dd class="total-price text-base font-bold text-gray-900"> {{ $viewData['total'] }}
                            </dd>
                        </dl>
                    </div>
                    <a href="#"
                        class="flex w-full items-center justify-center rounded-lg bg-brightPink px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300"> {{ __('cart.purchase') }} </a>

                    <div class="flex items-center justify-center gap-2">
                        <span class="text-sm font-normal text-gray-500"> {{ __('cart.or') }} </span>
                        <a href="{{ route('product.index') }}" title=""
                            class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline">
                            {{ __('cart.continue_shopping') }}
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var csrfToken = '{{ csrf_token() }}';
    var cartUpdateUrl = '{{ route("cart.update") }}';
</script>
<script src = "{{ asset('js/cart/update.js') }}""></script>
@endsection