<div class="mb-4">
  <label class="mb-2 block text-sm font-medium text-gray-900">
    {{ __("colorimetry.specific_needs_optional") }}
  </label>
  <div
    class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
  >
    <div class="space-y-2">
      @foreach ($options as $optionValue => $optionLabel)
        <label class="block">
          <input
            type="checkbox"
            name="specific_needs[]"
            value="{{ __($optionLabel) }}"
            class="mr-2 rounded checked:bg-brightPink focus:ring-brightPink"
            {{ (is_array(old("specific_needs")) && in_array(__($optionLabel), old("specific_needs"))) || (is_array($selected) && in_array(__($optionLabel), $selected)) ? "checked" : "" }}
          />
          {{ __($optionLabel) }}
        </label>
      @endforeach
    </div>
  </div>
</div>
