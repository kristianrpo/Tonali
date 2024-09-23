@extends("layouts.admin")
@section("title", __("category.my_categories"))
@section("content")
    <section class="antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <h1 class="mb-6 text-3xl font-bold text-gray-800">
                {{ __("category.my_categories") }}
            </h1>
            <div
                class="relative overflow-hidden bg-white shadow-md sm:rounded-lg"
            >
                <div
                    class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0"
                >
                    <div
                        class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0"
                    >
                        <a
                            href="{{ route("admin.category.create") }}"
                            class="hover:bg-primary-800 focus:ring-primary-300 flex items-center justify-center rounded-lg bg-brightPink px-4 py-2 text-sm font-medium text-white hover:bg-black focus:outline-none focus:ring-4"
                        >
                            <svg
                                class="mr-2 h-3.5 w-3.5"
                                fill="currentColor"
                                viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    clip-rule="evenodd"
                                    fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                />
                            </svg>
                            {{ __("category.add_category") }}
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead
                            class="bg-gray-50 text-xs uppercase text-gray-700"
                        >
                            <tr>
                                <th scope="col" class="px-4 py-4">
                                    {{ __("category.name") }}
                                </th>
                                <th scope="col" class="px-4 py-4">
                                    {{ __("category.description") }}
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">
                                        {{ __("category.actions") }}
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData["categories"] as $category)
                                <tr class="border-b">
                                    <td
                                        class="px-4 py-3 font-medium text-black"
                                    >
                                        {{ $category->getName() }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $category->getDescription() }}
                                    </td>
                                    <td
                                        class="flex items-center justify-end px-4 py-3"
                                    >
                                        <a
                                            href="{{ route("admin.category.edit", ["id" => $category->getId()]) }}"
                                            class="wf mx-2 mb-2 mt-4 inline-flex max-w-xs items-center rounded bg-palePink px-2 py-2 font-bold text-white hover:bg-black lg:mx-0"
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
                                        <form
                                            id="deleteForm"
                                            action="{{ route("admin.category.delete", ["id" => $category->getId()]) }}"
                                            method="POST"
                                            onsubmit="return confirmDelete(deleteConfirmationMessage)"
                                        >
                                            @csrf
                                            @method("DELETE")
                                            <button
                                                type="submit"
                                                href="{{ route("admin.category.delete", ["id" => $category->getId()]) }}"
                                                class="mx-2 mb-2 mt-4 inline-flex max-w-xs items-center rounded bg-red-500 px-2 py-2 font-bold text-white hover:bg-black"
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        let deleteConfirmationMessage =
            '{{ __("category.delete_confirmation") }}';
    </script>
    <script src="{{ asset("js/common/confirmDelete.js") }}"></script>
@endsection
