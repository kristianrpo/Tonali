@extends("layouts.admin")
@section("title", __("user.my_profile"))
@section("content")
  @if (session("success"))
    <x-alert :message="session('success')" />
  @endif

  <div class="mx-auto my-12 max-w-screen-lg">
    <h1
      class="mb-6 flex items-center justify-center text-center text-4xl font-bold text-gray-800"
    >
      <svg
        class="mr-2 h-[48px] w-[48px] text-gray-800 dark:text-black"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        fill="currentColor"
        viewBox="0 0 24 24"
      >
        <path
          fill-rule="evenodd"
          d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
          clip-rule="evenodd"
        />
      </svg>
      {{ __("user.admin_profile") }}
    </h1>
    <div class="grid grid-cols-1 items-start gap-6 md:grid-cols-2">
      <div class="rounded-lg border-2 bg-white px-6 py-8 md:grid-cols-2">
        <div class="grid grid-cols-1 items-start gap-6">
          <h2
            class="mb-4 flex items-center justify-center text-center text-2xl font-semibold text-gray-800"
          >
            <svg
              class="mr-2 h-[22px] w-[22px] text-gray-800 dark:text-black"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                fill-rule="evenodd"
                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                clip-rule="evenodd"
              />
            </svg>
            {{ __("user.personal_information") }}
          </h2>
          <div class="overflow-hidden rounded-lg bg-gray-50 p-6 shadow">
            <h2 class="mb-4 text-center text-2xl font-semibold text-gray-800">
              {{ $viewData["user"]->getName() }}
            </h2>
            <p class="mb-2 text-center text-lg text-gray-600">
              {{ __("user.email") }}: {{ $viewData["user"]->getEmail() }}
            </p>

            <div class="mt-4 flex justify-center">
              <a
                href="{{ route("profile.edit") }}"
                class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
              >
                <svg
                  class="h-6 w-6 dark:text-white"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill-rule="evenodd"
                    d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                    clip-rule="evenodd"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                    clip-rule="evenodd"
                  />
                </svg>
                {{ __("user.edit_profile") }}
              </a>
            </div>
          </div>
        </div>
      </div>

      <div>
        <button
          onclick="openDeleteModal()"
          type="button"
          class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
        >
          <svg
              class="h-6 w-6 text-white"
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

          {{ __("user.delete_admin") }}
        </button>
        <p
          class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400 sm:text-base"
        >
          <svg
            class="me-1.5 h-4 w-4 text-gray-500 dark:text-gray-400"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="none"
            viewBox="0 0 24 24"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
            />
          </svg>
          {{ __("user.information_delete_customer") }}
        </p>
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
              {{ __("user.delete_description") }}
            </p>
            <div class="flex items-center justify-center space-x-4">
              <button
                onclick="closeDeleteModal()"
                data-modal-toggle="deleteModal"
                type="button"
                class="focus:ring-primary-300 rounded-full border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600"
              >
                {{ __("user.cancel_button") }}
              </button>
              <form method="POST" action="{{ route("profile.delete") }}">
                @csrf
                @method("DELETE")
                <button
                  type="submit"
                  class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
                  onclick="openDeleteModal()"
                >
                  {{ __("user.delete_admin") }}
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
