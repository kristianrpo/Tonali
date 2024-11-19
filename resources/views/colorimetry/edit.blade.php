@extends("layouts.app")
@section("title", __("colorimetry.edit"))
@section("content")
  <div class="flex justify-center">
    <div class="relative max-h-full w-full max-w-2xl p-4">
      <div class="relative rounded-lg bg-white shadow">
        <div
          class="flex items-center justify-center rounded-t border-b border-gray-200 bg-brightPink p-4 md:p-5"
        >
          <h1 class="text-center text-3xl font-bold text-white">
            {{ __("user.edit_colorimetry") }}
          </h1>
        </div>
        <form
          class="p-4 md:p-5"
          method="POST"
          action="{{ route("colorimetry.update", ["id" => $viewData["colorimetry"]->getId()]) }}"
        >
          @csrf
          @method("PUT")
          <div class="col-span-2 mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.skin_tone") }}
            </label>
            <select
              name="skin_tone"
              id="skin_tone"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option
                value="{{ $viewData["colorimetry"]->getSkinTone() }}"
                selected
                hidden
              >
                {{ $viewData["colorimetry"]->getSkinTone() }}
              </option>
              <option
                value="{{ __("colorimetry.fair") }}"
                style="background-color: #fde9d9"
              >
                {{ __("colorimetry.fair") }}
              </option>
              <option
                value="{{ __("colorimetry.olive") }}"
                style="background-color: #dab984"
              >
                {{ __("colorimetry.olive") }}
              </option>
              <option
                value="{{ __("colorimetry.medium") }}"
                style="background-color: #c49a6c"
              >
                {{ __("colorimetry.medium") }}
              </option>
              <option
                value="{{ __("colorimetry.dark") }}"
                style="background-color: #8c6239"
              >
                {{ __("colorimetry.dark") }}
              </option>
            </select>
          </div>
          <div class="col-span-2 mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.skin_undertone") }}
            </label>
            <select
              name="skin_undertone"
              id="skin_undertone"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option
                value="{{ $viewData["colorimetry"]->getSkinUndertone() }}"
                selected
                hidden
              >
                {{ $viewData["colorimetry"]->getSkinUndertone() }}
              </option>
              <option
                value="{{ __("colorimetry.warm") }}"
                style="background-color: #f7d9c4"
              >
                {{ __("colorimetry.warm") }}
              </option>
              <option
                value="{{ __("colorimetry.cool") }}"
                style="background-color: #e4e9f0"
              >
                {{ __("colorimetry.cool") }}
              </option>
              <option
                value="{{ __("colorimetry.neutral") }}"
                style="background-color: #f0e4da"
              >
                {{ __("colorimetry.neutral") }}
              </option>
            </select>
          </div>
          <div class="col-span-2 mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.hair_color") }}
            </label>
            <select
              name="hair_color"
              id="hair_color"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option
                value="{{ $viewData["colorimetry"]->getHairColor() }}"
                selected
                hidden
              >
                {{ $viewData["colorimetry"]->getHairColor() }}
              </option>
              <option
                value="{{ __("colorimetry.blonde") }}"
                style="background-color: #f8e1b4"
              >
                {{ __("colorimetry.blonde") }}
              </option>
              <option
                value="{{ __("colorimetry.brunette") }}"
                style="background-color: #603813"
              >
                {{ __("colorimetry.brunette") }}
              </option>
              <option
                value="{{ __("colorimetry.red") }}"
                style="background-color: #b83922"
              >
                {{ __("colorimetry.red") }}
              </option>
              <option
                value="{{ __("colorimetry.black") }}"
                style="background-color: #1b1b1b; color: #fff"
              >
                {{ __("colorimetry.black") }}
              </option>
            </select>
          </div>
          <div class="col-span-2">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.eye_color") }}
            </label>
            <select
              name="eye_color"
              id="eye_color"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option
                value="{{ $viewData["colorimetry"]->getEyeColor() }}"
                selected
                hidden
              >
                {{ $viewData["colorimetry"]->getEyeColor() }}
              </option>
              <option
                value="{{ __("colorimetry.blue") }}"
                style="background-color: #7ec8e3"
              >
                {{ __("colorimetry.blue") }}
              </option>
              <option
                value="{{ __("colorimetry.green") }}"
                style="background-color: #98d382"
              >
                {{ __("colorimetry.green") }}
              </option>
              <option
                value="{{ __("colorimetry.brown") }}"
                style="background-color: #a0522d"
              >
                {{ __("colorimetry.brown") }}
              </option>
              <option
                value="{{ __("colorimetry.hazel") }}"
                style="background-color: #d4a16f"
              >
                {{ __("colorimetry.hazel") }}
              </option>
            </select>
          </div>

          <div class="col-span-2 mb-4 mt-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.specific_needs") }}
            </label>
            <div
              class="space-y-2 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <label class="block">
                <input
                  type="checkbox"
                  name="specific_needs[]"
                  value="{{ __("colorimetry.sensitive_skin") }}"
                  {{ in_array(__("colorimetry.sensitive_skin"), $viewData["selected_needs"]) ? "checked" : "" }}
                  class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                />
                {{ __("colorimetry.sensitive_skin") }}
              </label>
              <label class="block">
                <input
                  type="checkbox"
                  name="specific_needs[]"
                  value="{{ __("colorimetry.acne") }}"
                  {{ in_array(__("colorimetry.acne"), $viewData["selected_needs"]) ? "checked" : "" }}
                  class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                />
                {{ __("colorimetry.acne") }}
              </label>
              <label class="block">
                <input
                  type="checkbox"
                  name="specific_needs[]"
                  value="{{ __("colorimetry.dry") }}"
                  {{ in_array(__("colorimetry.dry"), $viewData["selected_needs"]) ? "checked" : "" }}
                  class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                />
                {{ __("colorimetry.dry") }}
              </label>
              <label class="block">
                <input
                  type="checkbox"
                  name="specific_needs[]"
                  value="{{ __("colorimetry.oil") }}"
                  {{ in_array(__("colorimetry.oil"), $viewData["selected_needs"]) ? "checked" : "" }}
                  class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                />
                {{ __("colorimetry.oil") }}
              </label>
            </div>
          </div>

          <div
            class="flex justify-center border-t border-gray-200 pt-4 md:pt-5"
          >
            <button
              type="submit"
              class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite focus:outline-none focus:ring-4"
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
              {{ __("colorimetry.edit_button") }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
