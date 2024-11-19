@extends("layouts.admin")
@section("title", __("category.edit_category"))
@section("content")
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <x-alert :message="$error" color="bg-red-500" />
    @endforeach
  @endif

  <div class="bottom-0 mx-auto max-w-screen-xl px-4 lg:px-12">
    <h1 class="mb-4 text-3xl font-bold text-gray-800">
      {{ __("category.edit_category") }}
    </h1>

    <form
      method="POST"
      action="{{ route("admin.category.update", ["id" => $viewData["category"]->getId()]) }}"
    >
      @csrf
      @method("PUT")
      <div class="grid gap-4">
        <div>
          <label
            for="name"
            class="mb-1 block text-sm font-medium text-gray-900"
          >
            {{ __("category.name") }}
          </label>
          <input
            type="text"
            name="name"
            id="name"
            class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
            placeholder="{{ __("category.name") }}"
            value="{{ $viewData["category"]->getName() }}"
          />
        </div>
        <div>
          <label
            for="description"
            class="mb-1 block text-sm font-medium text-gray-900"
          >
            {{ __("category.description") }}
          </label>
          <textarea
            name="description"
            id="description"
            rows="4"
            class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink"
            placeholder="{{ __("category.description") }}"
          >
{{ $viewData["category"]->getDescription() }}</textarea
          >
        </div>
      </div>
      <div class="mt-4">
        <button
          type="submit"
          class="mt-4 rounded-md bg-brightPink px-4 py-2 text-white hover:bg-black"
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
        </button>
      </div>
    </form>
  </div>
@endsection
