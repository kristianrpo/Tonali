@extends("layouts.app")
@section("content")
    <section class="bg-white py-8 antialiased md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="flex items-center gap-2">
                <h2 class="text-2xl font-semibold text-gray-900">
                    {{ __("review.reviews") }}
                </h2>
                <div class="mt-2 flex items-center gap-2 sm:mt-0">
                    <p class="text-sm font-medium leading-none text-gray-500">
                        ({{ $viewData["product"]->getQuantityReviews() }})
                    </p>
                </div>
            </div>

            <div class="my-6 gap-8 sm:flex sm:items-start md:my-8">
                <div class="shrink-0 space-y-4">
                    <p
                        class="text-2xl font-semibold leading-none text-gray-900"
                    >
                        {{ __("review.total_score") }}:
                        {{ $viewData["averageRating"] }}
                    </p>
                    <div class="flex items-center gap-1">
                        @for ($i = 0; $i < $viewData['calculatedStars']; $i++)
                            <svg
                                class="h-4 w-4 text-yellow-300"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                />
                            </svg>
                        @endfor
                    </div>
                    <br />
                    <a
                        href="{{ route("review.create", ["id" => $viewData["product"]->getId()]) }}"
                        class="hover:bg-primary-800 focus:ring-primary-300 mb-2 me-2 rounded-lg bg-brightPink px-5 py-2.5 text-sm font-medium text-offWhite focus:outline-none focus:ring-4"
                    >
                        {{ __("review.create_button") }}
                    </a>
                </div>
            </div>
            <div class="mt-6 divide-y divide-gray-200">
                @foreach ($viewData["product"]->getReviews() as $review)
                    <div class="gap-3 py-6 sm:flex sm:items-start">
                        <div class="shrink-0 space-y-2 sm:w-48 md:w-72">
                            <div class="flex items-center gap-0.5">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <svg
                                        class="h-4 w-4 text-yellow-300"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                        />
                                    </svg>
                                @endfor
                            </div>
                            <div class="space-y-0.5">
                                <p
                                    class="text-base font-semibold text-gray-900"
                                >
                                    {{ $review->getUser()->getName() }}
                                </p>
                                <p class="text-sm font-normal text-gray-500">
                                    {{ $review->getCreatedAt() }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4 min-w-0 flex-1 space-y-4 sm:mt-0">
                            <h2 class="text-black-500 font-bold">
                                {{ $review->getTitle() }}
                            </h2>
                            <p class="text-base font-normal text-gray-500">
                                {{ $review->getDescription() }}
                            </p>
                        </div>
                        <div
                            class="flex items-center justify-center sm:space-x-4"
                        >
                            <form
                                id="deleteForm"
                                action="{{ route("review.delete", ["id" => $review->getId()]) }}"
                                method="POST"
                                onsubmit="return confirmDelete(deleteConfirmationMessage)"
                            >
                                @csrf
                                @method("DELETE")
                                <button
                                    type="submit"
                                    href="{{ route("review.delete", ["id" => $review->getId()]) }}"
                                    class="mx-auto mb-2 mt-4 inline-flex max-w-xs items-center rounded bg-red-500 px-4 py-2 font-bold text-white"
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
                                </button>
                            </form>

                            <a
                                href="{{ route("review.edit", ["id" => $review->getId()]) }}"
                                class="wf mx-auto mb-2 mt-4 inline-flex max-w-xs items-center rounded bg-palePink px-4 py-2 font-bold text-white lg:mx-0"
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
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        let deleteConfirmationMessage =
            '{{ __("review.delete_confirmation") }}';
    </script>
    <script src="{{ asset("js/common/confirmDelete.js") }}"></script>
@endsection
