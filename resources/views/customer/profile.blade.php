@extends("layouts.app")
@section("title", __("user.my_profile"))
@section("content")
  <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
    <h2
      class="mb-4 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl md:mb-6"
    >
      {{ __("user.profile") }}
    </h2>
    <div
      class="gap-6 border-b border-t border-gray-200 py-4 dark:border-gray-700 md:py-8 lg:grid-cols-4 xl:gap-16"
    >
      <div class="mb-1 grid gap-2 sm:grid-cols-2 sm:gap-8 lg:gap-0">
        <div class="space-y-10">
          <div class="flex space-x-4">
            <div>
              <h2
                class="flex items-center text-xl font-bold leading-none text-gray-900 dark:text-white sm:text-2xl"
              >
                {{ $viewData["user"]->getName() }}
              </h2>
            </div>
          </div>
          <a
            href="{{ route("profile.edit") }}"
            class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
          >
            <svg
              class="-ms-0.5 me-1.5 h-4 w-4"
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
                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"
              ></path>
            </svg>
            {{ __("user.edit") }}
          </a>
        </div>
        <div class="space-y-2">
          <dl class="">
            <dt class="font-semibold text-gray-900 dark:text-white">
              {{ __("user.email") }}
            </dt>
            <dd class="text-gray-500 dark:text-gray-400">
              {{ $viewData["user"]->getEmail() }}
            </dd>
          </dl>
          <dl>
            <dt class="font-semibold text-gray-900 dark:text-white">
              {{ __("user.address") }}
            </dt>
            <dd
              class="flex items-center gap-1 text-gray-500 dark:text-gray-400"
            >
              <svg
                class="hidden h-5 w-5 shrink-0 text-gray-400 dark:text-gray-500 lg:inline"
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
                  d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"
                />
              </svg>
              {{ $viewData["user"]->getAddress() }}
            </dd>
          </dl>
          <dl>
            <dt class="font-semibold text-gray-900 dark:text-white">
              {{ __("user.cellphone") }}
            </dt>
            <dd class="text-gray-500 dark:text-gray-400">
              {{ $viewData["user"]->getCellphone() }}
            </dd>
          </dl>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-3 py-4 md:py-8">
      <div>
        <svg
          class="mb-2 h-8 w-8 text-gray-400 dark:text-gray-500"
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
            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"
          />
        </svg>
        <a
          href="{{ route("order.index") }}"
          class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
        >
          {{ __("user.view_orders") }}
        </a>
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
          {{ __("user.information_orders") }}
        </p>
      </div>
      <div>
        <svg
          class="mb-2 h-8 w-8 text-gray-400 dark:text-white"
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
            stroke-width="2.1"
            d="M15 9h.01M8.99 9H9m12 3a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM6.6 13a5.5 5.5 0 0 0 10.81 0H6.6Z"
          />
        </svg>
        <a
          href="{{ route("colorimetry.index") }}"
          class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
        >
          {{ __("user.view_colorimetry") }}
        </a>
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
          {{ __("user.information_colorimetry") }}
        </p>
      </div>
      <div>
        <svg
          class="mb-2 h-8 w-8 text-gray-400 dark:text-white"
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
            stroke-width="2.1"
            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"
          />
        </svg>
        <button
          onclick="openDeleteModal()"
          type="button"
          class="bg-primary-700 focus:ring-primary-300 me-2 inline-flex items-center rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-offWhite hover:bg-black focus:outline-none focus:ring-4"
        >
          {{ __("user.delete_customer") }}
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
    </div>
    <div
      id="deleteModal"
      tabindex="-1"
      aria-hidden="true"
      class="fixed inset-0 flex hidden items-center justify-center bg-gray-800 bg-opacity-75"
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
              class="focus:ring-primary-300 rounded-full rounded-lg border border-gray-200 bg-white px-3 px-5 py-2 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600"
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
                {{ __("user.delete_customer") }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
