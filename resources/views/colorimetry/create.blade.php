@extends("layouts.app")
@section("title", __("colorimetry.create"))
@section("content")
  <div class="flex justify-center">
    <div class="relative max-h-full w-full max-w-2xl p-4">
      <div class="relative rounded-lg bg-white shadow">
        <div
          class="flex items-center justify-center rounded-t border-b border-gray-200 bg-brightPink p-4 md:p-5"
        >
          <h1 class="text-center text-3xl font-bold text-white">
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
              <option
                value=""
                disabled
                {{ old("skin_tone") ? "" : "selected" }}
              >
                {{ __("colorimetry.skin_tone_select") }}
              </option>
              <option
                value="{{ __("colorimetry.fair") }}"
                style="background-color: #fde9d9"
                {{ old("skin_tone") === __("colorimetry.fair") ? "selected" : "" }}
              >
                {{ __("colorimetry.fair") }}
              </option>
              <option
                value="{{ __("colorimetry.olive") }}"
                style="background-color: #dab984"
                {{ old("skin_tone") === __("colorimetry.olive") ? "selected" : "" }}
              >
                {{ __("colorimetry.olive") }}
              </option>
              <option
                value="{{ __("colorimetry.medium") }}"
                style="background-color: #c49a6c"
                {{ old("skin_tone") === __("colorimetry.medium") ? "selected" : "" }}
              >
                {{ __("colorimetry.medium") }}
              </option>
              <option
                value="{{ __("colorimetry.dark") }}"
                style="background-color: #8c6239"
                {{ old("skin_tone") === __("colorimetry.dark") ? "selected" : "" }}
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
              <option
                value=""
                disabled
                {{ old("skin_undertone") ? "" : "selected" }}
              >
                {{ __("colorimetry.skin_undertone_select") }}
              </option>
              <option
                value="{{ __("colorimetry.warm") }}"
                style="background-color: #f7d9c4"
                {{ old("skin_undertone") === __("colorimetry.warm") ? "selected" : "" }}
              >
                {{ __("colorimetry.warm") }}
              </option>
              <option
                value="{{ __("colorimetry.cool") }}"
                style="background-color: #e4e9f0"
                {{ old("skin_undertone") === __("colorimetry.cool") ? "selected" : "" }}
              >
                {{ __("colorimetry.cool") }}
              </option>
              <option
                value="{{ __("colorimetry.neutral") }}"
                style="background-color: #f0e4da"
                {{ old("skin_undertone") === __("colorimetry.neutral") ? "selected" : "" }}
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
              <option
                value=""
                disabled
                {{ old("hair_color") ? "" : "selected" }}
              >
                {{ __("colorimetry.hair_color_select") }}
              </option>
              <option
                value="{{ __("colorimetry.blonde") }}"
                style="background-color: #f8e1b4"
                {{ old("hair_color") === __("colorimetry.blonde") ? "selected" : "" }}
              >
                {{ __("colorimetry.blonde") }}
              </option>
              <option
                value="{{ __("colorimetry.brunette") }}"
                style="background-color: #603813"
                {{ old("hair_color") === __("colorimetry.brunette") ? "selected" : "" }}
              >
                {{ __("colorimetry.brunette") }}
              </option>
              <option
                value="{{ __("colorimetry.red") }}"
                style="background-color: #b83922"
                {{ old("hair_color") === __("colorimetry.red") ? "selected" : "" }}
              >
                {{ __("colorimetry.red") }}
              </option>
              <option
                value="{{ __("colorimetry.black") }}"
                style="background-color: #1b1b1b; color: #fff"
                {{ old("hair_color") === __("colorimetry.black") ? "selected" : "" }}
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
              <option
                value=""
                disabled
                {{ old("eye_color") ? "" : "selected" }}
              >
                {{ __("colorimetry.eye_color_select") }}
              </option>
              <option
                value="{{ __("colorimetry.blue") }}"
                style="background-color: #7ec8e3"
                {{ old("eye_color") === __("colorimetry.blue") ? "selected" : "" }}
              >
                {{ __("colorimetry.blue") }}
              </option>
              <option
                value="{{ __("colorimetry.green") }}"
                style="background-color: #98d382"
                {{ old("eye_color") === __("colorimetry.green") ? "selected" : "" }}
              >
                {{ __("colorimetry.green") }}
              </option>
              <option
                value="{{ __("colorimetry.brown") }}"
                style="background-color: #a0522d"
                {{ old("eye_color") === __("colorimetry.brown") ? "selected" : "" }}
              >
                {{ __("colorimetry.brown") }}
              </option>
              <option
                value="{{ __("colorimetry.hazel") }}"
                style="background-color: #d4a16f"
                {{ old("eye_color") === __("colorimetry.hazel") ? "selected" : "" }}
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
                    {{ is_array(old("specific_needs")) && in_array(__("colorimetry.sensitive_skin"), old("specific_needs")) ? "checked" : "" }}
                  />
                  {{ __("colorimetry.sensitive_skin") }}
                </label>
                <label class="block">
                  <input
                    type="checkbox"
                    name="specific_needs[]"
                    value="{{ __("colorimetry.acne") }}"
                    class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                    {{ is_array(old("specific_needs")) && in_array(__("colorimetry.acne"), old("specific_needs")) ? "checked" : "" }}
                  />
                  {{ __("colorimetry.acne") }}
                </label>
                <label class="block">
                  <input
                    type="checkbox"
                    name="specific_needs[]"
                    value="{{ __("colorimetry.dry") }}"
                    class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                    {{ is_array(old("specific_needs")) && in_array(__("colorimetry.dry"), old("specific_needs")) ? "checked" : "" }}
                  />
                  {{ __("colorimetry.dry") }}
                </label>
                <label class="block">
                  <input
                    type="checkbox"
                    name="specific_needs[]"
                    value="{{ __("colorimetry.oil") }}"
                    class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
                    {{ is_array(old("specific_needs")) && in_array(__("colorimetry.oil"), old("specific_needs")) ? "checked" : "" }}
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
