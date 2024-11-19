@extends("layouts.app")

@section("content")
  @if (session("success"))
    <x-alert :message="session('success')" color="bg-green-500" />
  @endif

  @if (session("error"))
    <x-alert :message="session('error')" color="bg-red-500" />
  @endif

  <head>
    <title>{{ $viewData["petProduct"]["name"] }}</title>
  </head>
  <body>
    <div class="container mx-auto w-4/5">
      <div class="flex flex-col items-center gap-6 md:flex-row">
        <img
          src="{{ $viewData["petProduct"]["image"] }}"
          alt="{{ $viewData["petProduct"]["name"] }}"
          class="h-64 w-64 rounded-lg object-cover shadow-md"
        />

        <div>
          <h1 class="mb-2 text-xl font-semibold text-gray-900 sm:text-2xl">
            {{ $viewData["petProduct"]["name"] }}
          </h1>
          <p class="mb-1 text-2xl font-extrabold text-gray-900">
            {{ formatPrice($viewData["petProduct"]["price"]) }}
          </p>
          <p class="italic text-gray-900">
            {{ $viewData["petProduct"]["category"] }} -
            {{ $viewData["petProduct"]["species"] }}
          </p>

          <p class="text-gray-500">
            {{ $viewData["petProduct"]["description"] }}
          </p>
          <p class="mt-4">
            <a
              href="{{ $viewData["petProduct"]["link"] }}"
              target="_blank"
              class="text-brightPink hover:underline"
            >
              {{ __("petProduct.more_details") }}
            </a>
          </p>
        </div>
      </div>
    </div>
  </body>
@endsection
