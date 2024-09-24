@extends("layouts.app")
@section("content")
  @if (session("success"))
    <x-alert :message="session('success')" />
  @endif

  <div class="container mx-auto py-8">
    <div class="grid grid-cols-1 items-start gap-6">
      <div class="rounded-lg border-2 bg-white px-6 py-8 md:grid-cols-2">
        <div class="grid grid-cols-1 items-start gap-6">
          <h2 class="mb-4 text-center text-2xl font-semibold text-gray-800">
            {{ __("colorimetry.colorimetry") }}
          </h2>
          <div class="overflow-hidden rounded-lg bg-gray-50 p-6 shadow">
            @if (! $viewData["colorimetry"])
              <div class="text-center">
                <p class="mb-4">{{ __("colorimetry.without_colorimetry") }}</p>
                <a
                  href="{{ route("colorimetry.create") }}"
                  class="rounded-full bg-brightPink px-4 py-2 text-white transition duration-300 hover:bg-black"
                >
                  {{ __("user.create_colorimetry") }}
                </a>
              </div>
            @else
              <div class="mb-8 text-center">
                <p>
                  <strong>{{ __("colorimetry.skinTone") }}:</strong>
                  {{ $viewData["colorimetry"]->getSkinTone() }}
                </p>
                <p>
                  <strong>{{ __("colorimetry.skinUndertone") }}:</strong>
                  {{ $viewData["colorimetry"]->getSkinUndertone() }}
                </p>
                <p>
                  <strong>{{ __("colorimetry.hairColor") }}:</strong>
                  {{ $viewData["colorimetry"]->getHairColor() }}
                </p>
                <p>
                  <strong>{{ __("colorimetry.eyeColor") }}:</strong>
                  {{ $viewData["colorimetry"]->getEyeColor() }}
                </p>
                <p>
                  <strong>{{ __("colorimetry.specificNeeds") }}:</strong>
                  @if ($viewData["colorimetry"]->getSpecificNeeds())
                    {{ implode(", ", json_decode($viewData["colorimetry"]->getSpecificNeeds())) }}
                  @else
                    {{ __("colorimetry.without_needs") }}
                  @endif
                </p>
                <div class="mt-4 flex items-start justify-center">
                  <a
                    href="{{ route("colorimetry.edit", ["id" => $viewData["colorimetry"]->getId()]) }}"
                    class="mt-6 rounded-full bg-brightPink px-4 py-2 text-white transition duration-300 hover:bg-black"
                  >
                    {{ __("user.edit_colorimetry") }}
                  </a>
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
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
