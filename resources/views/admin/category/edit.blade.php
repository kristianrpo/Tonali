@extends("layouts.admin")
@section("title", __("category.edit_category"))
@section("content")
    <div class="bottom-0 mx-auto max-w-screen-xl px-4 lg:px-12">
        <h1 class="mb-4 text-3xl font-bold text-gray-800">
            {{ __("category.edit_category") }}
        </h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" />
            @endforeach
        @endif

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
                    {{ __("category.edit") }}
                </button>
            </div>
        </form>
    </div>
@endsection
