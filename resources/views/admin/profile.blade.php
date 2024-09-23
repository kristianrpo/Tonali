@extends("layouts.admin")
@section("content")
    <div class="max-w-screen-lg mx-auto my-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">
            {{ __("user.admin_profile") }}
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            <div class="bg-white border-2 md:grid-cols-2 rounded-lg px-6 py-8">
                <div class="grid grid-cols-1 gap-6 items-start">
                    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">
                        {{ __("user.personal_information") }}
                    </h2>
                    <div class="overflow-hidden rounded-lg bg-gray-50 shadow p-6">
                        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">
                            {{ $viewData['user']->getName() }}
                        </h2>
                        <p class="text-lg text-center text-gray-600 mb-2">
                            {{ __("user.email") }}: {{ $viewData['user']->getEmail() }}
                        </p>

                        <div class="flex justify-center mt-4">
                            <a href="{{ route('profile.edit') }}" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
                                {{ __("user.edit_profile") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="overflow-hidden rounded-lg bg-gray-50 shadow p-6">
                <div class="flex justify-center items-start mt-4">
                    <button onclick="openDeleteModal()" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
                        {{ __('user.delete_customer') }}
                    </button>
                </div>
                <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
                    <div class="bg-white rounded-lg p-6 w-1/3">
                        <h2 class="text-lg font-semibold mb-4">{{ __('user.confirm_delete_title') }}</h2>
                        <p class="mb-4">{{ __('user.delete') }}</p>
                        <div class="flex justify-end">
                            <button onclick="closeDeleteModal()" class="text-center bg-gray-300 py-2 px-4 rounded-full hover:bg-black hover:text-white transition duration-300">
                                {{ __('user.cancel_button') }}
                            </button>
                            <form method="POST" action="{{ route('admin.delete')}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300 ml-4" onclick="openDeleteModal()">{{ __("user.delete_customer") }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
