@extends("layouts.app")
@section("content")
    <div class="flex justify-center">
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <div class="relative rounded-lg bg-white shadow">
                <div
                    class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5 bg-brightPink"
                >
                    <div>
                        <h1 class="mb-1 text-lg font-semibold text-gray-900 text-offWhite">
                            {{ __("user.edit_colorimetry") }}
                        </h1>
                    </div>
                </div>
                <form
                    class="p-4 md:p-5"
                    method="POST"
                    action="{{ route("colorimetry.update", ["id" => $viewData["colorimetry"]->getId()]) }}"
                >
                    @csrf
                    @method("PUT")
                    <div class="col-span-2 mb-4">
                        <label
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("colorimetry.skinTone") }}
                        </label>
                        <select 
                            name="skinTone" 
                            id="skinTone" 
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900">
                            <option value="{{ $viewData["colorimetry"]->getSkinTone() }}">{{ $viewData["colorimetry"]->getSkinTone() }}</option>
                            <option value="{{ __("colorimetry.fair") }}">{{ __("colorimetry.fair") }}</option>
                            <option value="{{ __("colorimetry.olive") }}">{{ __("colorimetry.olive") }}</option>
                            <option value="{{ __("colorimetry.medium") }}">{{ __("colorimetry.medium") }}</option>
                            <option value="{{ __("colorimetry.dark") }}">{{ __("colorimetry.dark") }}</option>
                        </select>
                    </div>
                    <div class="col-span-2 mb-4">
                        <label
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("colorimetry.skinUndertone") }}
                        </label>
                        <select 
                            name="skinUndertone" 
                            id="skinUndertone" 
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900">
                            <option value="{{ $viewData["colorimetry"]->getSkinUndertone() }}">{{ $viewData["colorimetry"]->getSkinUndertone() }}</option>
                            <option value="{{ __("colorimetry.warm") }}">{{ __("colorimetry.warm") }}</option>
                            <option value="{{ __("colorimetry.cool") }}">{{ __("colorimetry.cool") }}</option>
                            <option value="{{ __("colorimetry.neutral") }}">{{ __("colorimetry.neutral") }}</option>
                        </select>
                    </div>
                    <div class="col-span-2 mb-4">
                        <label
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("colorimetry.hairColor") }}
                        </label>
                        <select 
                            name="hairColor" 
                            id="hairColor" 
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900">
                            <option value="{{ $viewData["colorimetry"]->getHairColor() }}">{{ $viewData["colorimetry"]->getHairColor() }}</option>
                            <option value="{{ __("colorimetry.blonde") }}">{{ __("colorimetry.blonde") }}</option>
                            <option value="{{ __("colorimetry.brunette") }}">{{ __("colorimetry.brunette") }}</option>
                            <option value="{{ __("colorimetry.red") }}">{{ __("colorimetry.red") }}</option>
                            <option value="{{ __("colorimetry.black") }}">{{ __("colorimetry.black") }}</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label
                            class="mb-2 block text-sm font-medium text-gray-900"
                        >
                            {{ __("colorimetry.eyeColor") }}
                        </label>
                        <select 
                            name="eyeColor" 
                            id="eyeColor" 
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900">
                            <option value="{{ $viewData["colorimetry"]->getEyeColor() }}">{{ $viewData["colorimetry"]->getEyeColor() }}</option>
                            <option value="{{ __("colorimetry.blue") }}">{{ __("colorimetry.blue") }}</option>
                            <option value="{{ __("colorimetry.green") }}">{{ __("colorimetry.green") }}</option>
                            <option value="{{ __("colorimetry.brown") }}">{{ __("colorimetry.brown") }}</option>
                            <option value="{{ __("colorimetry.hazel") }}">{{ __("colorimetry.hazel") }}</option>
                        </select>
                    </div>

                    <div class="col-span-2 mb-4 mt-4">
                        <label class="mb-2 block text-sm font-medium text-gray-900">
                            {{ __("colorimetry.specificNeeds") }}
                        </label>
                        <select 
                            name="specificNeeds[]" 
                            id="specificNeeds" 
                            multiple 
                            class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900">
                            
                            <option value="{{ __("colorimetry.sensitive_skin") }}" 
                                {{ in_array("Sensitive Skin", $viewData['selectedNeeds']) ? 'selected' : '' }}>{{ __("colorimetry.sensitive_skin") }}</option>
                            <option value="{{ __("colorimetry.acne") }}" 
                                {{ in_array("Acne-Prone", $viewData['selectedNeeds']) ? 'selected' : '' }}>{{ __("colorimetry.acne") }}</option>
                            <option value="{{ __("colorimetry.dry") }}" 
                                {{ in_array("Dry Skin", $viewData['selectedNeeds']) ? 'selected' : '' }}>{{ __("colorimetry.dry") }}</option>
                            <option value="{{ __("colorimetry.oil") }}" 
                                {{ in_array("Oily Skin", $viewData['selectedNeeds']) ? 'selected' : '' }}>{{ __("colorimetry.oil") }}</option>
                        </select>
                    </div>

                    <div
                        class="flex justify-center border-t border-gray-200 pt-4 md:pt-5"
                    >
                        <button
                            type="submit"
                            class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite focus:outline-none focus:ring-4"
                        >
                            {{ __("colorimetry.edit_button") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset("js/review/stars.js") }}"></script>
@endsection