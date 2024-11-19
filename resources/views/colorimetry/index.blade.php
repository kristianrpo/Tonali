@extends("layouts.app")
@section("title", __("colorimetry.colorimetry"))
@section("content")
  @if (session("success"))
    <x-alert :message="session('success')" color="bg-green-500" />
  @endif

  <div class="container mx-auto w-4/5">
    <div class="grid grid-cols-1 items-start gap-6">
      <div class="rounded-lg border-2 bg-white px-6 py-8 md:grid-cols-2">
        <div class="grid grid-cols-1 items-start gap-6">
          @if (! $viewData["colorimetry"])
            <section class="bg-white px-4 antialiased dark:bg-gray-900">
              <div
                class="mx-auto grid max-w-screen-xl rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16"
              >
                <div class="lg:col-span-5 lg:mt-0">
                  <img
                    src="{{ asset("img/colorimetry/default.png") }}"
                    class="h-auto w-full rounded-lg"
                    alt="{{ __("colorimetry.default_image") }}"
                  />
                </div>
                <div class="me-auto place-self-center lg:col-span-7">
                  <h1
                    class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl"
                  >
                    {{ __("colorimetry.without_colorimetry") }}
                  </h1>
                  <p class="mb-6 text-gray-500 dark:text-gray-400">
                    {{ __("colorimetry.without_colorimetry_description") }}
                  </p>
                  <a
                    href="{{ route("colorimetry.create") }}"
                    class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
                  >
                    {{ __("user.create_colorimetry") }}
                  </a>
                </div>
              </div>
            </section>
          @else
            <h1 class="mb-4 text-center text-3xl font-bold text-gray-800">
              {{ __("colorimetry.colorimetry") }}
            </h1>
            <div class="overflow-hidden rounded-lg bg-gray-50 p-6 shadow">
              <div class="mx-auto max-w-screen-xl px-4 py-8 sm:py-16 lg:px-6">
                <div
                  class="space-y-4 md:grid md:grid-cols-3 md:gap-6 md:space-y-0 lg:grid-cols-3"
                >
                  <div class="mb-4">
                    <div class="flex items-center">
                      <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-brightPink dark:bg-brightPink lg:h-12 lg:w-12"
                      >
                        <svg
                          class="text-primary-600 dark:text-primary-300 h-5 w-5 lg:h-6 lg:w-6"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 512 512"
                        >
                          <path
                            fill="#ffffff"
                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"
                          />
                        </svg>
                      </div>
                      <h3 class="ml-2 text-xl font-bold dark:text-white">
                        {{ __("colorimetry.skin_tone") }}
                      </h3>
                    </div>
                    <p class="mt-2 text-lg text-gray-700 dark:text-gray-400">
                      {{ $viewData["colorimetry"]->getSkinTone() }}
                    </p>
                  </div>
                  <div class="mb-4">
                    <div class="flex items-center">
                      <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-brightPink dark:bg-brightPink lg:h-12 lg:w-12"
                      >
                        <svg
                          class="text-primary-600 dark:text-primary-30 h-5 w-5 lg:h-6 lg:w-6"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 512 512"
                        >
                          <path
                            fill="#ffffff"
                            d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm177.6 62.1C192.8 334.5 218.8 352 256 352s63.2-17.5 78.4-33.9c9-9.7 24.2-10.4 33.9-1.4s10.4 24.2 1.4 33.9c-22 23.8-60 49.4-113.6 49.4s-91.7-25.5-113.6-49.4c-9-9.7-8.4-24.9 1.4-33.9s24.9-8.4 33.9 1.4zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"
                          />
                        </svg>
                      </div>
                      <h3 class="ml-2 text-xl font-bold dark:text-white">
                        {{ __("colorimetry.skin_undertone") }}
                      </h3>
                    </div>
                    <p class="mt-2 text-lg text-gray-700 dark:text-gray-400">
                      {{ $viewData["colorimetry"]->getSkinUndertone() }}
                    </p>
                  </div>
                  <div class="mb-4">
                    <div class="flex items-center">
                      <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-brightPink dark:bg-brightPink lg:h-12 lg:w-12"
                      >
                        <svg
                          class="h-7 w-7 text-white"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"
                          />
                        </svg>
                      </div>
                      <h3 class="ml-2 text-xl font-bold dark:text-white">
                        {{ __("colorimetry.hair_color") }}
                      </h3>
                    </div>
                    <p class="mt-2 text-lg text-gray-700 dark:text-gray-400">
                      {{ $viewData["colorimetry"]->getHairColor() }}
                    </p>
                  </div>
                  <div class="mb-4">
                    <div class="flex items-center">
                      <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-brightPink dark:bg-brightPink lg:h-12 lg:w-12"
                      >
                        <svg
                          class="text-primary-600 h-5 w-5 dark:text-white lg:h-6 lg:w-6"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 576 512"
                        >
                          <path
                            fill="#ffffff"
                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                          />
                        </svg>
                      </div>
                      <h3 class="ml-2 text-xl font-bold dark:text-white">
                        {{ __("colorimetry.eye_color") }}
                      </h3>
                    </div>
                    <p class="mt-2 text-lg text-gray-700 dark:text-gray-400">
                      {{ $viewData["colorimetry"]->getEyeColor() }}
                    </p>
                  </div>
                  <div class="mb-4">
                    <div class="flex items-center">
                      <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-brightPink dark:bg-brightPink lg:h-12 lg:w-12"
                      >
                        <svg
                          class="text-primary-600 dark:text-primary-300 h-5 w-5 lg:h-6 lg:w-6"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 512 512"
                        >
                          <path
                            fill="#ffffff"
                            d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-176c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 272c0 1.5 0 3.1 .1 4.6L67.6 283c-16-15.2-41.3-14.6-56.6 1.4s-14.6 41.3 1.4 56.6L124.8 448c43.1 41.1 100.4 64 160 64l19.2 0c97.2 0 176-78.8 176-176l0-208c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-176c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 176c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208zM240 336a16 16 0 1 1 32 0 16 16 0 1 1 -32 0zm80 16a16 16 0 1 1 0 32 16 16 0 1 1 0-32zm48-16a16 16 0 1 1 32 0 16 16 0 1 1 -32 0zm-16 80a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM240 432a16 16 0 1 1 32 0 16 16 0 1 1 -32 0zm-48-48a16 16 0 1 1 0 32 16 16 0 1 1 0-32z"
                          />
                        </svg>
                      </div>
                      <h3 class="ml-2 text-xl font-bold dark:text-white">
                        {{ __("colorimetry.specific_needs") }}
                      </h3>
                    </div>
                    <p class="mt-2 text-lg text-gray-700 dark:text-gray-400">
                      @if ($viewData["colorimetry"]->getSpecificNeeds())
                        {{ implode(", ", json_decode($viewData["colorimetry"]->getSpecificNeeds())) }}
                      @else
                        {{ __("colorimetry.without_needs") }}
                      @endif
                    </p>
                  </div>
                  <div class="justify-center">
                    <div class="border-2 rounded-lg p-4 bg-white shadow flex justify-center items-center">
                      <div class="flex flex-col gap-4 max-w-xs mr-5">
                        <a
                          href="{{ route("colorimetry.edit", ["id" => $viewData["colorimetry"]->getId()]) }}"
                          class="flex items-center justify-center rounded-lg bg-palePink px-4 py-2 text-white hover:bg-black focus:ring-4 focus:ring-blue-300"
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
                          {{ __("colorimetry.edit") }}
                        </a>
                      </div>
                      <button
                        onclick="openDeleteModal()"
                        type="button"
                        class="flex items-center justify-center rounded-lg bg-brightPink px-4 py-2 text-white hover:bg-black focus:ring-4 focus:ring-primary-300"
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
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"
                          />
                        </svg>
                        {{ __("colorimetry.delete") }}
                      </button>
                    </div>
                    <div
                      id="deleteModal"
                      tabindex="-1"
                      aria-hidden="true"
                      class="fixed inset-0 hidden items-center justify-center bg-gray-800 bg-opacity-75"
                    >
                      <div class="relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md p-4"">
                        <div
                          class="relative rounded-lg bg-white p-4 text-center shadow dark:bg-gray-800 sm:p-5"
                        >
                          <svg
                            class="mx-auto mb-3.5 h-11 w-11 text-gray-400 dark:text-gray-500"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd"
                            ></path>
                          </svg>
                          <p class="mb-4 text-gray-500 dark:text-gray-300">
                            {{ __("colorimetry.delete_description") }}
                          </p>
                          <div class="flex items-center justify-center space-x-4">
                            <button
                              onclick="closeDeleteModal()"
                              data-modal-toggle="deleteModal"
                              type="button"
                              class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600"
                            >
                              {{ __("colorimetry.cancel") }}
                            </button>
                            <form method="POST" action="{{ route("colorimetry.delete", $viewData["colorimetry"]->getId()) }}">
                              @csrf
                              @method("DELETE")
                              <button
                                type="submit"
                                class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
                                onclick="openDeleteModal()"
                              >
                                {{ __("colorimetry.delete") }}
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
