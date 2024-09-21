@extends("layouts.admin")
@section("content")
    <div class="bottom-0 mx-auto max-w-screen-xl px-4 lg:px-12">
        <h2 class="mb-4 text-3xl font-bold text-gray-800">
            {{ __("category.create_category") }}
        </h2>
        @if ($errors->any())
            <ul
                id="errors"
                class="alert alert-danger relative mb-2 list-none rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700"
            >
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form
            method="POST"
            action="{{ route('admin.category.store') }}"
        >
            @csrf
            <div class="grid gap-4">
                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-gray-900">
                        {{ __("category.name") }}
                    </label>
                    <input type="text" name="name" id="name" class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink" placeholder="{{ __("category.name") }}" value="{{ old("name") }}"/>
                </div>
                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-gray-900">
                        {{ __("category.description") }}
                    </label>
                    <textarea name="description" id="description" class="form-control w-full rounded-md border border-gray-300 p-2 focus:border-brightPink focus:ring-1 focus:ring-brightPink" placeholder="{{ __("category.description") }}">{{ old("description") }}</textarea>
                </div>
            </div>
            <button
                type="submit"
                class="mt-4 rounded-md bg-brightPink px-4 py-2 text-white hover:bg-black"
            >
                    {{ __("category.create_category") }}
                </button>
        </form>
    </div>
@endsection
