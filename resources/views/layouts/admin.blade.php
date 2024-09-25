<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script
      src="https://kit.fontawesome.com/52165e5e88.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <title>@yield("title", __("layoutApp.title"))</title>

    @vite("resources/css/app.css")
  </head>

  <body class="flex min-h-screen flex-col">
    <nav
      class="fixed left-0 right-0 top-0 z-50 border-b border-gray-200 bg-white px-10 py-2.5 shadow-md"
    >
      <div class="flex flex-wrap items-center justify-between">
        <div class="flex items-center justify-start">
          <button
            data-drawer-target="drawer-navigation"
            data-drawer-toggle="drawer-navigation"
            aria-controls="drawer-navigation"
            class="mr-2 cursor-pointer rounded-lg p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 md:hidden"
          >
            <svg
              aria-hidden="true"
              class="h-6 w-6"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <svg
              aria-hidden="true"
              class="hidden h-6 w-6"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <span class="sr-only">
              {{ __("layoutApp.toggle_sidebar") }}
            </span>
          </button>
          <div class="mx-6 flex items-center space-x-3 rtl:space-x-reverse">
            <img
              src="{{ asset("img/logos/dark/icon.png") }}"
              class="h-12"
              alt="{{ __("layoutApp.icon_alt") }}"
            />
            <span class="self-center whitespace-nowrap text-2xl font-semibold">
              {{ __("layoutApp.navbar_title") }}
            </span>
          </div>
        </div>
        <div class="flex items-center lg:order-2">
          <div class="group relative">
            <label for="dropdown-toggle" class="cursor-pointer text-white">
              <div
                class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-darkGray hover:bg-palePink"
                data-dropdown-toggle="dropdown-profile"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 512 512"
                  id="profile"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M256 250.8a73.34 73.34 0 1 1 73.33-73.34A73.41 73.41 0 0 1 256 250.8zm0-125.53a52.2 52.2 0 1 0 52.19 52.19A52.25 52.25 0 0 0 256 125.27zm117.07 282.6H138.93l-10.57-10.57a127.64 127.64 0 1 1 255.28 0zM150 386.73h212a106.51 106.51 0 0 0-212 0z"
                  />
                </svg>
              </div>
            </label>

            <div
              id="dropdown-profile"
              class="absolute right-0 z-20 mt-2 hidden w-48 rounded-md bg-white shadow-lg"
              aria-labelledby="dropdown-toggle"
            >
              <a
                href="#"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-200"
              >
                {{ __("auth.profile") }}
              </a>
              <form action="{{ route("logout") }}" method="POST" class="block">
                @csrf
                <button
                  type="submit"
                  class="w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-200"
                >
                  {{ __("auth.logout") }}
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <aside
      class="absolute left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-14 transition-transform md:translate-x-0"
      aria-label="Sidenav"
      id="drawer-navigation"
    >
      <div class="h-full overflow-y-auto bg-white px-3 py-5">
        <ul class="space-y-2">
          <li>
            <a
              href="{{ route("admin.product.index") }}"
              class="group flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100"
            >
              <svg
                aria-hidden="true"
                class="h-6 w-6 text-gray-400 transition duration-75 group-hover:text-gray-900"
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
              <span class="ml-3">
                {{ __("product.products") }}
              </span>
            </a>
          </li>
          <li>
            <a
              href="{{ route("admin.category.index") }}"
              class="group flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100"
            >
              <svg
                aria-hidden="true"
                class="h-6 w-6 text-gray-400 transition duration-75 group-hover:text-gray-900"
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
              <span class="ml-3">
                {{ __("product.categories") }}
              </span>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <main class="min-h-60 flex-1 p-4 pt-20 md:ml-64">
      @yield("content")
    </main>

    <footer class="left-0 right-0 z-50 mt-8 flex bg-brightPink shadow">
      <div class="mx-auto w-full max-w-screen-xl p-4 md:py-8">
        <div class="flex items-center justify-center">
          <img
            src="{{ asset("img/logos/light/combinationMark.png") }}"
            class="h-60"
            alt="{{ __("layoutApp.combination_mark_alt") }}"
          />
        </div>
        <hr class="mx-auto my-6 border-offWhite" />
        <span class="block text-center text-sm font-bold text-offWhite">
          {{ __("layoutApp.copyright") }}
        </span>
      </div>
    </footer>
  </body>
</html>
