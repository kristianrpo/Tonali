@extends("layouts.admin")
@section("content")
    @if (session("success"))
        <div class="mb-10 flex justify-center">
            <div
                class="w-3/4 rounded-b bg-palePink px-4 py-3 text-offWhite shadow-md"
                role="alert"
            >
                <div class="flex">
                    <div class="mx-5 py-1">
                        <svg
                            class="mr-4 h-6 w-6 fill-white"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                            />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">
                            {{ __("product.notification") }}
                        </p>
                        <p class="text-sm">
                            {{ session("success") }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <section class="bg-gray-50">
        <div class="mx-auto max-w-2xl px-4">
            <div class="w-full text-left">
                <h2 class="mb-2 text-3xl font-bold text-gray-900">
                    {{ $viewData["product"]->getName() }}
                </h2>
                <p class="mb-2 text-xl text-gray-700">
                    {{ formatPrice($viewData["product"]->getPrice()) }}
                </p>
            </div>

            <div
                class="flex w-full flex-col space-y-6 lg:flex-row lg:space-x-6 lg:space-y-0"
            >
                <img
                    src="{{ $viewData["product"]->getImageUrl() }}"
                    alt="Product Image"
                    class="mb-3 max-h-80 max-w-80 rounded-lg shadow-md"
                />

                <div class="rounded-lg p-5">
                    <ul class="text-gray-700">
                        <li class="mb-2">
                            <strong class="block text-gray-900">
                                {{ __("product.brand") }}:
                            </strong>
                            <span class="text-gray-500">
                                {{ $viewData["product"]->getBrand() }}
                            </span>
                        </li>
                        <li class="mb-2">
                            <strong class="block text-gray-900">
                                {{ __("product.category") }}:
                            </strong>
                            <span class="text-gray-500">
                                {{ $viewData["product"]->getCategory()->getName() }}
                            </span>
                        </li>
                        <li class="mb-2">
                            <strong class="block text-gray-900">
                                {{ __("product.stock_quantity") }}:
                            </strong>
                            <span class="text-gray-500">
                                {{ $viewData["product"]->getStockQuantity() }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full space-y-6">
                <p class="text-justify text-gray-700">
                    {{ $viewData["product"]->getDescription() }}
                </p>

                <div class="flex justify-start space-x-3">
                    <a
                        href="{{ route("admin.product.edit", ["id" => $viewData["product"]->getId()]) }}"
                        class="flex items-center justify-center rounded-lg bg-palePink px-4 py-2 text-white hover:bg-black focus:ring-4 focus:ring-blue-300"
                    >
                        <svg
                            class="h-6 w-6 text-white"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="white"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"
                            />
                        </svg>
                        {{ __("product.edit") }}
                    </a>

                    <form
                        action="{{ route("admin.product.delete", $viewData["product"]->getId()) }}"
                        method="POST"
                        onsubmit="return confirmDelete(deleteConfirmationMessage)"
                    >
                        @csrf
                        @method("DELETE")
                        <button
                            type="submit"
                            class="flex items-center justify-center rounded-lg bg-red-500 px-4 py-2 text-white hover:bg-black focus:ring-4 focus:ring-blue-300"
                        >
                            <svg
                                class="h-6 w-6 text-white"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke="white"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"
                                />
                            </svg>
                            {{ __("product.delete") }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        let deleteConfirmationMessage =
            '{{ __("product.delete_confirmation") }}';
    </script>
    <script src="{{ asset("js/common/confirmDelete.js") }}"></script>
@endsection
