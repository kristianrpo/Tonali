@extends("layouts.app")

@section("content")
  @if (session("success"))
    <x-alert :message="session('success')" color="bg-green-500" />
  @endif

  @if (session("error"))
    <x-alert :message="session('error')" color="bg-red-500" />
  @endif

  <head>
    <title>{{ $viewData["instrument"]["name"] }}</title>
  </head>
  <body>
    <div class="container mx-auto w-4/5">
      <h1 class="mb-2 text-xl font-semibold text-gray-900 sm:text-2xl">
        {{ $viewData["instrument"]["name"] }}
      </h1>
      <p class="mb-1 text-2xl font-extrabold text-gray-900">
        {{ number_format($viewData["instrument"]["price"], 2) }}
      </p>
      <p class="text-gray-500">{{ $viewData["instrument"]["description"] }}</p>
      <p class="mt-4">
        <a
          href="{{ $viewData["instrument"]["url"] }}"
          target="_blank"
          class="text-brightPink hover:underline"
        >
          {{ __("instrument.more_details") }}
        </a>
      </p>
    </div>
  </body>
@endsection
