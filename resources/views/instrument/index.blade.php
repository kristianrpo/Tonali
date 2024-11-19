@extends("layouts.app")
@section("title", __("instrument.instruments"))
@section("content")
  <div class="container mx-auto w-4/5">
    <div class="mb-5 flex items-center rounded-lg bg-pink-100 p-6 shadow-md">
      <div class="mr-4 text-pink-600">
        <svg
          class="h-12 w-12 text-gray-800 dark:text-white"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            fill-rule="evenodd"
            d="M17.316 4.052a.99.99 0 0 0-.9.14c-.262.19-.416.495-.416.82v8.566a4.573 4.573 0 0 0-2-.464c-1.99 0-4 1.342-4 3.443 0 2.1 2.01 3.443 4 3.443 1.99 0 4-1.342 4-3.443V6.801c.538.5 1 1.219 1 2.262 0 .56.448 1.013 1 1.013s1-.453 1-1.013c0-1.905-.956-3.18-1.86-3.942a6.391 6.391 0 0 0-1.636-.998 4 4 0 0 0-.166-.063l-.013-.005-.005-.002h-.002l-.002-.001ZM4 5.012c-.552 0-1 .454-1 1.013 0 .56.448 1.013 1 1.013h9c.552 0 1-.453 1-1.013 0-.559-.448-1.012-1-1.012H4Zm0 4.051c-.552 0-1 .454-1 1.013 0 .56.448 1.013 1 1.013h9c.552 0 1-.454 1-1.013 0-.56-.448-1.013-1-1.013H4Zm0 4.05c-.552 0-1 .454-1 1.014 0 .559.448 1.012 1 1.012h4c.552 0 1-.453 1-1.012 0-.56-.448-1.013-1-1.013H4Z"
            clip-rule="evenodd"
          />
        </svg>
      </div>
      <p class="text-md text-gray-700">
        {{ __("instrument.introduction") }}
      </p>
    </div>

    <h1 class="mb-4 text-3xl font-bold text-gray-800">
      {{ __("instrument.instruments") }}
    </h1>

    @foreach ($viewData["instruments"] as $instrument)
      <div
        class="mb-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm"
      >
        <h2 class="text-lg font-semibold text-gray-900">
          <a
            href="{{ route("instrument.show", ["id" => $instrument["id"]]) }}"
            class="hover:underline"
          >
            {{ $instrument["name"] }}
          </a>
        </h2>
        <p class="mt-1 text-gray-500">
          {{ number_format($instrument["price"], 2) }}
        </p>
      </div>
    @endforeach
  </div>
@endsection
