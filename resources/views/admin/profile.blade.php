@extends("layouts.admin")
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
                class="flex rounded-full bg-brightPink px-4 py-2 text-center text-white transition duration-300 hover:bg-black"
              >
                <svg
                  class="h-6 w-6 text-gray-800 dark:text-white"
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

      <div class="overflow-hidden rounded-lg bg-gray-50 p-6 shadow">
        <div class="mt-4 flex items-start justify-center">
          <button
            onclick="openDeleteModal()"
            class="flex rounded-full bg-brightPink px-4 py-2 text-center text-white transition duration-300 hover:bg-black"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              x="0px"
              y="0px"
              width="20"
              height="20"
              viewBox="0,0,300,150"
            >
              <g
                fill="#ffffff"
                fill-rule="nonzero"
                stroke="none"
                stroke-width="1"
                stroke-linecap="butt"
                stroke-linejoin="miter"
                stroke-miterlimit="10"
                stroke-dasharray=""
                stroke-dashoffset="0"
                font-family="none"
                font-weight="none"
                font-size="none"
                text-anchor="none"
                style="mix-blend-mode: normal"
              >
                <g transform="scale(10.66667,10.66667)">
                  <path
                    d="M10.80664,2c-0.517,0 -1.01095,0.20431 -1.37695,0.57031l-0.42969,0.42969h-5c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h16c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-5l-0.42969,-0.42969c-0.365,-0.366 -0.85995,-0.57031 -1.37695,-0.57031zM4.36523,7l1.52734,13.26367c0.132,0.99 0.98442,1.73633 1.98242,1.73633h8.24805c0.998,0 1.85138,-0.74514 1.98438,-1.74414l1.52734,-13.25586z"
                  ></path>
                </g>
              </g>
            </svg>
            {{ __("user.delete_customer") }}
          </button>
        </div>
        <div
          id="deleteModal"
          class="fixed inset-0 flex hidden items-center justify-center bg-gray-800 bg-opacity-75"
        >
          <div class="w-1/3 rounded-lg bg-white p-6">
            <h2 class="mb-4 text-lg font-semibold">
              {{ __("user.confirm_delete_title") }}
            </h2>
            <p class="mb-4">{{ __("user.delete") }}</p>
            <div class="flex justify-end">
              <button
                onclick="closeDeleteModal()"
                class="rounded-full bg-gray-300 px-4 py-2 text-center transition duration-300 hover:bg-black hover:text-white"
              >
                {{ __("user.cancel_button") }}
              </button>
              <form method="POST" action="{{ route("admin.delete") }}">
                @csrf
                @method("DELETE")
                <button
                  type="submit"
                  class="ml-4 rounded-full bg-brightPink px-4 py-2 text-center text-white transition duration-300 hover:bg-black"
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
  </div>
@endsection
