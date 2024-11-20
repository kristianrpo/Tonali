@extends("layouts.admin")
@section("content")
  <section class="antialiased">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
      <div class="text-center">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">
          {{ __("admin.welcome_title") }}
        </h1>
        <p class="mb-6 text-lg text-gray-600">
          {{ __("admin.welcome_description") }}
        </p>
      </div>
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <a
          href="{{ route("admin.product.index") }}"
          class="block transform rounded-lg bg-white p-6 shadow-md transition hover:scale-105 hover:shadow-lg"
        >
          <div class="flex items-center space-x-4">
            <svg
              aria-hidden="true"
              class="h-10 w-10 text-brightPink transition duration-75 group-hover:text-gray-900"
              width="24"
              height="24"
              fill="none"
              viewBox="0 0 23 23"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"
              />
            </svg>
            <div>
              <h2 class="text-lg font-medium text-gray-800">
                {{ __("admin.products") }}
              </h2>
              <p class="text-sm text-gray-500">
                {{ __("admin.manage_products") }}
              </p>
            </div>
          </div>
        </a>
        <a
          href="{{ route("admin.category.index") }}"
          class="block transform rounded-lg bg-white p-6 shadow-md transition hover:scale-105 hover:shadow-lg"
        >
          <div class="flex items-center space-x-4">
            <svg
              aria-hidden="true"
              class="h-10 w-10 text-brightPink transition duration-75 group-hover:text-gray-900"
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
                d="M15.583 8.445h.01M10.86 19.71l-6.573-6.63a.993.993 0 0 1 0-1.4l7.329-7.394A.98.98 0 0 1 12.31 4l5.734.007A1.968 1.968 0 0 1 20 5.983v5.5a.992.992 0 0 1-.316.727l-7.44 7.5a.974.974 0 0 1-1.384.001Z"
              />
            </svg>
            <div>
              <h2 class="text-lg font-medium text-gray-800">
                {{ __("admin.categories") }}
              </h2>
              <p class="text-sm text-gray-500">
                {{ __("admin.manage_categories") }}
              </p>
            </div>
          </div>
        </a>
        <a
          href="{{ route("home.index") }}"
          class="block transform rounded-lg bg-white p-6 shadow-md transition hover:scale-105 hover:shadow-lg"
        >
          <div class="flex items-center space-x-4">
            <svg
              aria-hidden="true"
              class="h-10 w-10 text-brightPink transition duration-75 group-hover:text-gray-900"
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
                d="M4 6h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm0 0v.01M8 6v.01M12 6v.01M4 10h16"
              />
            </svg>
            <div>
              <h2 class="text-lg font-medium text-gray-800">
                {{ __("admin.client_page") }}
              </h2>
              <p class="text-sm text-gray-500">
                {{ __("admin.see_client_page") }}
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
@endsection
