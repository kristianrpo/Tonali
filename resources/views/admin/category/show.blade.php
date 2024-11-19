@extends("layouts.admin")
@section("title", __("category.detail_category"))
@section("content")
  @if (session("success"))
    <x-alert :message="session('success')" color="bg-green-500" />
  @endif

  <section class="bg-gray-50">
    <div class="mx-auto max-w-2xl px-4">
      <div class="w-full text-left">
        <h1 class="mb-2 text-3xl font-bold text-gray-900">
          {{ $viewData["category"]->getName() }}
        </h1>
        <p class="text-justify text-gray-700">
          {{ $viewData["category"]->getDescription() }}
        </p>
      </div>
    </div>
    <div class="flex justify-start space-x-3">
      <a
        href="{{ route("admin.category.edit", ["id" => $viewData["category"]->getId()]) }}"
        class="flex items-center justify-center rounded-lg bg-brightPink px-4 py-2 text-white hover:bg-black focus:ring-4 focus:ring-blue-300"
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
        {{ __("category.edit") }}
      </a>

      <form
        action="{{ route("admin.category.delete", $viewData["category"]->getId()) }}"
        method="POST"
        onsubmit="return confirmDelete(deleteConfirmationMessage)"
      >
        @csrf
        @method("DELETE")
        <button
          type="submit"
          class="flex items-center justify-center rounded-lg bg-brightPink px-4 py-2 text-white hover:bg-black focus:ring-4 focus:ring-blue-300"
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
          {{ __("category.delete") }}
        </button>
      </form>
    </div>
  </section>
@endsection
