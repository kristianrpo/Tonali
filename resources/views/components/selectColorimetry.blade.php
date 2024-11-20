<div class="mb-4">
  <label class="mb-2 block text-sm font-medium text-gray-900">
    {{ $label }}
  </label>
  <select
    name="{{ $name }}"
    id="{{ $id ?? $name }}"
    class="focus:border-primary-600 focus:ring-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
  >
    <option value="" disabled {{ $selected ? "" : "selected" }}>
      {{ $placeholder }}
    </option>
    @foreach ($options as $optionValue => $optionLabel)
      <option
        value="{{ __($optionLabel) }}"
        style="{{ $styles[$optionValue] ?? "" }}"
        {{ $selected === $optionValue ? "selected" : "" }}
      >
        {{ __($optionLabel) }}
      </option>
    @endforeach
  </select>
</div>
