@extends("layouts.app")
@section("title", __("colorimetry.create"))
@section("content")
  <div class="flex justify-center">
    <div class="relative w-full max-w-5xl p-4">
      <div class="relative rounded-lg bg-white shadow">
        <div
          class="flex items-center justify-between rounded-t border-b border-gray-200 bg-brightPink p-4 md:p-5"
        >
          <h1 class="mb-1 text-lg font-semibold text-offWhite">
            {{ __("colorimetry.create") }}
          </h1>
        </div>
        <form
          method="POST"
          action="{{ route("colorimetry.store") }}"
          class="p-4 md:flex-grow md:p-5"
        >
          @csrf
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <x-alert :message="$error" color="bg-red-500" />
            @endforeach
          @endif

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.skin_tone") }}
            </label>
            <select
              name="skin_tone"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="" disabled selected>
                {{ __("colorimetry.skin_tone_select") }}
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

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.skin_undertone") }}
            </label>
            <select
              name="skin_undertone"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="" disabled selected>
                {{ __("colorimetry.skin_undertone_select") }}
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

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.hair_color") }}
            </label>
            <select
              name="hair_color"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="" disabled selected>
                {{ __("colorimetry.hair_color_select") }}
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

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.eye_color") }}
            </label>
            <select
              name="eye_color"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="" disabled selected>
                {{ __("colorimetry.eye_color_select") }}
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

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.specific_needs_optional") }}
            </label>
            <div
              class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <div class="space-y-2">
                <label class="block">
                  <input
                    type="checkbox"
                    name="specific_needs[]"
                    value="{{ __("colorimetry.sensitive_skin") }}"
                    class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                  />
                  {{ __("colorimetry.sensitive_skin") }}
                </label>
                <label class="block">
                  <input
                    type="checkbox"
                    name="specific_needs[]"
                    value="{{ __("colorimetry.acne") }}"
                    class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                  />
                  {{ __("colorimetry.acne") }}
                </label>
                <label class="block">
                  <input
                    type="checkbox"
                    name="specific_needs[]"
                    value="{{ __("colorimetry.dry") }}"
                    class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                  />
                  {{ __("colorimetry.dry") }}
                </label>
                <label class="block">
                  <input
                    type="checkbox"
                    name="specific_needs[]"
                    value="{{ __("colorimetry.oil") }}"
                    class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                  />
                  {{ __("colorimetry.oil") }}
                </label>
              </div>
            </div>
          </div>

          <div
            class="flex justify-center border-t border-gray-200 pt-4 md:pt-5"
          >
            <button
              type="submit"
              class="bg-primary-700 focus:ring-primary-300 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite focus:outline-none focus:ring-4"
            >
              {{ __("colorimetry.send_button") }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
