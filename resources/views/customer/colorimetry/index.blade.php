@extends("layouts.app")
@section("content")
@if (session("success"))
    <div class="mb-10 flex justify-center">
        <div
            class="w-3/4 rounded-b bg-palePink px-4 py-3 text-offWhite shadow-md"
            role="alert"
        >
            <div class="flex">
                <div class="mx-5 py-1">
                    <svg
                        class="mr-4 h-6 w-6 fill-white"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                        />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">
                        {{ __("product.notification") }}
                    </p>
                    <p class="text-sm">
                        {{ session("success") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
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
                                <form method="POST" action="{{ route('colorimetry.delete', ['id' => $viewData['colorimetry']->getId()])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-center bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black transition duration-300" onclick="return confirm('{{ __('colorimetry.delete') }}');">{{ __("user.delete_colorimetry") }}</button>
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