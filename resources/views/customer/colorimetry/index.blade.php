@extends("layouts.app")
@section("content")
    @if (session("success"))
        <x-alert :message="session('success')" />
    @endif
<div class="container mx-auto py-8">

    
    <div class="grid grid-cols-1 gap-6 items-start">
        <div class="bg-white border-2 md:grid-cols-2 rounded-lg px-6 py-8">
            <div class="grid grid-cols-1 gap-6 items-start">
                <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">
                    {{ __("colorimetry.colorimetry") }}
                </h2>
                <div class="overflow-hidden rounded-lg bg-gray-50 shadow p-6">
                    @if(!$viewData['colorimetry'])
                        <div class="text-center">
                            <p class="mb-4">{{ __("colorimetry.without_colorimetry") }}</p>
                            <a href="{{ route('colorimetry.create') }}" class="bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
                                {{ __("user.create_colorimetry") }}
                            </a>
                        </div>
                    @else
                        <div class="text-center mb-8">
                            <p><strong>{{ __("colorimetry.skinTone") }}:</strong> {{ $viewData['colorimetry']->getSkinTone() }}</p>
                            <p><strong>{{ __("colorimetry.skinUndertone") }}:</strong> {{ $viewData['colorimetry']->getSkinUndertone() }}</p>
                            <p><strong>{{ __("colorimetry.hairColor") }}:</strong> {{ $viewData['colorimetry']->getHairColor() }}</p>
                            <p><strong>{{ __("colorimetry.eyeColor") }}:</strong> {{ $viewData['colorimetry']->getEyeColor() }}</p>
                            <p><strong>{{ __("colorimetry.specificNeeds") }}:</strong> 
                                @if($viewData['colorimetry']->getSpecificNeeds())
                                    {{ implode(', ', json_decode($viewData['colorimetry']->getSpecificNeeds())) }}
                                @else
                                {{ __("colorimetry.without_needs") }}
                                @endif
                            </p>
                            <div class="flex justify-center items-start mt-4">
                                <a href="{{ route('colorimetry.edit', ['id' => $viewData['colorimetry']->getId()]) }}" class="bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300 mt-6">
                                    {{ __("user.edit_colorimetry") }}
                                </a>
                            </div>
                            <div class="flex justify-center items-start mt-4">
                                <button onclick="openDeleteModal()" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300">
                                    {{ __('user.delete_colorimetry') }}
                                </button>
                            </div>
                            <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
                                <div class="bg-white rounded-lg p-6 w-1/3">
                                    <h2 class="text-lg font-semibold mb-4">{{ __('user.confirm_delete_colorimetry_title') }}</h2>
                                    <p class="mb-4">{{ __('user.delete_colorimetry_description') }}</p>
                                    <div class="flex justify-end">
                                        <button onclick="closeDeleteModal()" class="text-center bg-gray-300 py-2 px-4 rounded-full hover:bg-black hover:text-white transition duration-300">
                                            {{ __('user.cancel_button') }}
                                        </button>
                                        <form method="POST" action="{{ route('colorimetry.delete', ['id' => $viewData['colorimetry']->getId()])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300 ml-4">{{ __("user.delete_colorimetry") }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection