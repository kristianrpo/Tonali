@extends("layouts.app")
@section("content")
@if (session("success"))
    <x-alert :message="session('success')" />
@endif
<div class="container mx-auto w-4/5">
    <div class="grid grid-cols-1 gap-6 items-start">
        <div class="bg-white border-2 md:grid-cols-2 rounded-lg px-6 py-8">
            <div class="grid grid-cols-1 gap-6 items-start">
                <h1 class="text-center mb-4 text-3xl font-bold text-gray-800">
                    {{ __("colorimetry.colorimetry") }}
                </h1>
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
                            <p><strong>{{ __("colorimetry.skin_tone") }}:</strong> {{ $viewData['colorimetry']->getSkinTone() }}</p>
                            <p><strong>{{ __("colorimetry.skin_undertone") }}:</strong> {{ $viewData['colorimetry']->getSkinUndertone() }}</p>
                            <p><strong>{{ __("colorimetry.hair_color") }}:</strong> {{ $viewData['colorimetry']->getHairColor() }}</p>
                            <p><strong>{{ __("colorimetry.eye_color") }}:</strong> {{ $viewData['colorimetry']->getEyeColor() }}</p>
                            <p><strong>{{ __("colorimetry.specific_needs") }}:</strong> 
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
                        </div>
                        <div class="mt-4 flex items-start justify-center">
                        <button
                            onclick="openDeleteModal()"
                            class="rounded-full bg-brightPink px-4 py-2 text-center text-white transition duration-300 hover:bg-black"
                        >
                            {{ __("user.delete_colorimetry") }}
                        </button>
                        </div>
                        <div
                        id="deleteModal"
                        class="fixed inset-0 flex hidden items-center justify-center bg-gray-800 bg-opacity-75"
                        >
                            <div class="w-1/3 rounded-lg bg-white p-6">
                                <h2 class="mb-4 text-lg font-semibold">
                                {{ __("user.confirm_delete_colorimetry_title") }}
                                </h2>
                                <p class="mb-4">
                                {{ __("user.delete_colorimetry_description") }}
                                </p>
                                <div class="flex justify-end">
                                <button
                                    onclick="closeDeleteModal()"
                                    class="rounded-full bg-gray-300 px-4 py-2 text-center transition duration-300 hover:bg-black hover:text-white"
                                >
                                    {{ __("user.cancel_button") }}
                                </button>
                                <form
                                    method="POST"
                                    action="{{ route("colorimetry.delete", ["id" => $viewData["colorimetry"]->getId()]) }}"
                                >
                                    @csrf
                                    @method("DELETE")
                                    <button
                                    type="submit"
                                    class="ml-4 rounded-full bg-brightPink px-4 py-2 text-center text-white transition duration-300 hover:bg-black"
                                    >
                                    {{ __("user.delete_colorimetry") }}
                                    </button>
                            </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
