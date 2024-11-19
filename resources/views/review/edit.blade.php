@extends("layouts.app")
@section("title", __("review.edit_review"))
@section("content")
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <x-alert :message="$error" color="bg-red-500" />
    @endforeach
  @endif

  <div class="flex justify-center">
    <div class="relative max-h-full w-full max-w-2xl p-4">
      <div class="relative rounded-lg bg-white shadow">
        <div
          class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5"
        >
          <div>
            <h1 class="mb-1 text-lg font-semibold text-gray-900">
              {{ __("review.edit_review") }}
            </h1>
            <h2>
              {{ $viewData["review"]->getProduct()->getName() }}
            </h2>
          </div>
        </div>
        <form
          class="p-4 md:p-5"
          method="POST"
          action="{{ route("review.update", ["id" => $viewData["review"]->getId()]) }}"
        >
          @csrf
          @method("PUT")
          <div class="col-span-2 mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("review.rating") }}
            </label>
            <div class="flex items-center">
              @for ($i = 1; $i <= 5; $i++)
                <svg
                  class="star {{ $i <= $viewData["review"]->getRating() ? "text-yellow-300" : "text-gray-300" }} h-6 w-6 cursor-pointer hover:text-yellow-300"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 22 20"
                  data-value="{{ $i }}"
                >
                  <path
                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                  />
                </svg>
              @endfor
            </div>
            <input
              type="hidden"
              name="rating"
              id="ratingInput"
              value="{{ $viewData["review"]->getRating() }}"
            />
          </div>

          <div class="col-span-2 mb-2">
            <label
              for="title"
              class="mb-2 block text-sm font-medium text-gray-900"
            >
              {{ __("review.title_form") }}
            </label>
            <input
              type="text"
              name="title"
              id="title"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
              value="{{ $viewData["review"]->getTitle() }}"
              required
            />
          </div>

          <div class="col-span-2 mb-2">
            <label
              for="description"
              class="mb-2 block text-sm font-medium text-gray-900"
            >
              {{ __("review.description_form") }}
            </label>
            <textarea
              name="description"
              id="description"
              rows="6"
              class="focus:border-primary-500 focus:ring-primary-500 mb-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
              required
            >
{{ $viewData["review"]->getDescription() }}</textarea
            >
          </div>

          <div
            class="flex justify-center border-t border-gray-200 pt-4 md:pt-5"
          >
            <button
              type="submit"
              class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite focus:outline-none focus:ring-4"
            >
              {{ __("review.edit_button") }}
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
