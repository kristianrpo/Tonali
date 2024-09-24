@extends("layouts.app")
@section("content")
    <div class="container mx-auto w-4/5">
        <h1 class="text-center mb-4 text-3xl font-bold text-gray-800">
            {{ __("user.profile") }}
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            <div class="bg-white border-2 md:grid-cols-2 rounded-lg px-6 py-4">
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

                        @if($viewData['user']->getCellphone() == "0")
                            <p class="text-lg text-center text-gray-600 mb-2">
                                {{ __("user.cellphone") }}: --
                            </p>
                        @else
                            <p class="text-lg text-center text-gray-600 mb-2">
                                {{ __("user.cellphone") }}: {{ $viewData['user']->getCellphone() }}
                            </p>
                        @endif

                        @if($viewData['user']->getAddress() == "#")
                            <p class="text-lg text-center text-gray-600 mb-2">
                                {{ __("user.address") }}: --
                            </p>
                        @else
                            <p class="text-lg text-center text-gray-600 mb-2">
                                {{ __("user.address") }}: {{ $viewData['user']->getAddress() }}
                            </p>
                        @endif

                        <div class="flex justify-center mt-4">
                            <a href="{{ route('profile.edit') }}" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
                                {{ __("user.edit_profile") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden rounded-lg bg-gray-50 shadow p-6">
                <div class="flex justify-center items-start">
                    <a href="#" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
                        {{ __("user.view_orders") }}
                    </a>
                </div>
                <div class="flex justify-center items-start mt-4">
                    <a href="{{ route('colorimetry.index') }}" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
                        {{ __("user.view_colorimetry") }}
                    </a>
                </div>
                <div class="flex justify-center items-start mt-4">
                    <form method="POST" action="{{ route('profile.delete')}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300" onclick="return confirm('{{ __('user.delete') }}');">{{ __("user.delete_customer") }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
