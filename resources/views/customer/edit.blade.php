@extends("layouts.app")
@section("content")
    <div class="flex justify-center">
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <div class="relative rounded-lg bg-white shadow">
                <div
                    class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5"
                >
                    <div>
                        <h1 class="mb-1 text-lg font-semibold text-gray-900">
                            {{ __("user.edit_user") }}
                        </h1>
                    </div>
                </div>
                <form
                    class="p-4 md:p-5"
                    method="POST"
                    action="{{ route('profile.update') }}"
                >
                    @csrf
                    @method("PUT")
                    <div class="col-span-2 mb-4">
                        <label
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("user.name") }}
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                            value="{{ $viewData["user"]->getName() }}"
                            required
                        />
                    </div>
                    <div class="col-span-2 mb-4">
                        <label
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("user.email") }}
                        </label>
                        <input
                            type="text"
                            name="email"
                            id="email"
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                            value="{{ $viewData["user"]->getEmail() }}"
                            required
                        />
                    </div>
                    <div class="col-span-2 mb-4">
                        <label
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("user.cellphone") }}
                        </label>
                        <input
                            type="text"
                            name="cellphone"
                            id="cellphone"
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                            value="{{ $viewData["user"]->getCellphone() }}"
                            required
                        />
                    </div>
                    <div class="col-span-2">
                        <label
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("user.address") }}
                        </label>
                        <input
                            type="text"
                            name="address"
                            id="address"
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                            value="{{ $viewData["user"]->getAddress() }}"
                            required
                        />
                    </div>

                    <div
                        class="flex justify-center border-t border-gray-200 pt-4 md:pt-5"
                    >
                        <button
                            type="submit"
                            class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite focus:outline-none focus:ring-4"
                        >
                            {{ __("user.edit_button") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset("js/review/stars.js") }}"></script>
@endsection