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
              <x-alert :message="$error" />
            @endforeach
          @endif

          <x-selectColorimetry
            label="{{ __('colorimetry.skin_tone') }}"
            name="skin_tone"
            :options="config('colorimetry.skin_tones')"
            placeholder="{{ __('colorimetry.skin_tone_select') }}"
            :styles="config('colorimetry.skin_tone_styles')"
            :selected="old('skin_tone')"
          />

          <x-selectColorimetry
            label="{{ __('colorimetry.skin_undertone') }}"
            name="skin_undertone"
            :options="config('colorimetry.skin_undertones')"
            placeholder="{{ __('colorimetry.skin_undertone_select') }}"
            :styles="config('colorimetry.skin_undertone_styles')"
            :selected="old('skin_undertone')"
          />

          <x-selectColorimetry
            label="{{ __('colorimetry.hair_color') }}"
            name="hair_color"
            :options="config('colorimetry.hair_colors')"
            placeholder="{{ __('colorimetry.hair_color_select') }}"
            :styles="config('colorimetry.hair_color_styles')"
            :selected="old('hair_color')"
          />

          <x-selectColorimetry
            label="{{ __('colorimetry.eye_color') }}"
            name="eye_color"
            :options="config('colorimetry.eye_colors')"
            placeholder="{{ __('colorimetry.eye_color_select') }}"
            :styles="config('colorimetry.eye_color_styles')"
            :selected="old('eye_color')"
          />

          <x-checkboxColorimetry
            :options="config('colorimetry.specific_needs')"
          />

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
