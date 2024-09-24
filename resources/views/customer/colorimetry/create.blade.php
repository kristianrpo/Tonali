@extends("layouts.app")
@section("content")
  <div class="flex justify-center">
    <div class="relative max-h-full w-full max-w-2xl p-4">
      <div class="relative rounded-lg bg-white shadow">
        <div
          class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5"
        >
          <div>
            <h1 class="mb-1 text-lg font-semibold text-gray-900">
              {{ __("colorimetry.create") }}
            </h1>
          </div>
        </div>
        <form
          method="POST"
          action="{{ route("colorimetry.save") }}"
          class="p-4 md:p-5"
        >
          @csrf
          @if ($errors->any())
            <ul id="errors" class="mb-4 list-disc text-red-500">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.skinTone") }}
            </label>
            <select
              name="skinTone"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="" disabled selected>
                {{ __("colorimetry.skinTone_select") }}
              </option>
              <option value="{{ __("colorimetry.fair") }}">
                {{ __("colorimetry.fair") }}
              </option>
              <option value="{{ __("colorimetry.olive") }}">
                {{ __("colorimetry.olive") }}
              </option>
              <option value="{{ __("colorimetry.medium") }}">
                {{ __("colorimetry.medium") }}
              </option>
              <option value="{{ __("colorimetry.dark") }}">
                {{ __("colorimetry.dark") }}
              </option>
            </select>
          </div>

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.skinUndertone") }}
            </label>
            <select
              name="skinUndertone"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="" disabled selected>
                {{ __("colorimetry.skinUndertone_select") }}
              </option>
              <option value="{{ __("colorimetry.warm") }}">
                {{ __("colorimetry.warm") }}
              </option>
              <option value="{{ __("colorimetry.cool") }}">
                {{ __("colorimetry.cool") }}
              </option>
              <option value="{{ __("colorimetry.neutral") }}">
                {{ __("colorimetry.neutral") }}
              </option>
            </select>
          </div>

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.hairColor") }}
            </label>
            <select
              name="hairColor"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="" disabled selected>
                {{ __("colorimetry.hairColor_select") }}
              </option>
              <option value="{{ __("colorimetry.blonde") }}">
                {{ __("colorimetry.blonde") }}
              </option>
              <option value="{{ __("colorimetry.brunette") }}">
                {{ __("colorimetry.brunette") }}
              </option>
              <option value="{{ __("colorimetry.red") }}">
                {{ __("colorimetry.red") }}
              </option>
              <option value="{{ __("colorimetry.black") }}">
                {{ __("colorimetry.black") }}
              </option>
            </select>
          </div>

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.eyeColor") }}
            </label>
            <select
              name="eyeColor"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="" disabled selected>
                {{ __("colorimetry.eyeColor_select") }}
              </option>
              <option value="{{ __("colorimetry.blue") }}">
                {{ __("colorimetry.blue") }}
              </option>
              <option value="{{ __("colorimetry.green") }}">
                {{ __("colorimetry.green") }}
              </option>
              <option value="{{ __("colorimetry.brown") }}">
                {{ __("colorimetry.brown") }}
              </option>
              <option value="{{ __("colorimetry.hazel") }}">
                {{ __("colorimetry.hazel") }}
              </option>
            </select>
          </div>

          <div class="mb-4">
            <label class="mb-2 block text-sm font-medium text-gray-900">
              {{ __("colorimetry.specificNeeds_optional") }}
            </label>
            <select
              name="specificNeeds[]"
              multiple
              size="4"
              class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
            >
              <option value="{{ __("colorimetry.sensitive_skin") }}">
                {{ __("colorimetry.sensitive_skin") }}
              </option>
              <option value="{{ __("colorimetry.acne") }}">
                {{ __("colorimetry.acne") }}
              </option>
              <option value="{{ __("colorimetry.dry") }}">
                {{ __("colorimetry.dry") }}
              </option>
              <option value="{{ __("colorimetry.oil") }}">
                {{ __("colorimetry.oil") }}
              </option>
            </select>
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
