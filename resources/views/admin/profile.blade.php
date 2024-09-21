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
                    <form method="POST" action="{{ route('admin.delete')}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">{{ __("user.delete_admin") }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
