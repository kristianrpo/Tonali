@extends("layouts.app")
@section("content")
    <div class="flex justify-center">
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <div class="relative rounded-lg bg-white shadow">
                <div
                    class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5"
                >
                    <div>
                        <h1 class="mb-1 text-lg font-semibold text-gray-900">
                            {{ __("review.report_review") }}
                        </h1>
                        <h2>
                            {{ $viewData["review"]->getProduct()->getName() }}
                        </h2>
                    </div>
                </div>
                <form
                    class="p-4 md:p-5"
                    method="POST"
                    action="{{ route("review.validateReport", ["id" => $viewData["review"]->getId()]) }}"
                >
                    @csrf
                    <div class="col-span-2">
                        <label
                            for="title"
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("review.report_title_form") }}
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                            required
                        />
                    </div>

                    <div class="col-span-2">
                        <label
                            for="description"
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("review.report_description_form") }}
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="6"
                            class="focus:border-primary-500 focus:ring-primary-500 mb-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                            required
                        ></textarea>
                    </div>

                    <div
                        class="flex justify-center border-t border-gray-200 pt-4 md:pt-5"
                    >
                        <button
                            type="submit"
                            class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite focus:outline-none focus:ring-4"
                        >
                            {{ __("review.report_button") }}
                        </button>
                        <a
                            href="{{ route("product.show", ["id" => $viewData["review"]->getProduct()->getId()]) }}"
                            class="me-2 rounded-lg border border-gray-200 bg-brightPink px-5 py-2.5 text-sm font-medium text-offWhite focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100"
                        >
                            {{ __("review.cancel_button") }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset("js/review/stars.js") }}"></script>
@endsection