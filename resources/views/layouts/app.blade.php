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
    @vite("resources/js/app.js")
  </head>

  <body class="flex min-h-screen flex-col">
    <nav class="border-gray-200 bg-white shadow-md">
      <div
        class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-around p-4"
      >
        <a href="{{ route("home.index") }}">
          <div class="flex items-center space-x-3 rtl:space-x-reverse">
            <img
              src="{{ asset("img/logos/dark/icon.png") }}"
              class="h-12"
              alt="{{ __("layoutApp.icon_alt") }}"
            />
            <span class="self-center whitespace-nowrap text-2xl font-semibold">
              {{ __("layoutApp.navbar_title") }}
            </span>
          </div>
        </a>
        <div class="flex md:order-1">
          <button
            data-collapse-toggle="navbar-search"
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-darkGray hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-200 lg:hidden"
            aria-controls="navbar-search"
            aria-expanded="false"
          >
            <svg
              class="h-5 w-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 17 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15"
              />
            </svg>
          </button>
        </div>
        <div
          class="hidden w-full items-center justify-between md:order-1 md:w-auto lg:flex"
          id="navbar-search"
        >
          <div
            class="d-flex align-items-center justify-content-center mr-5 mt-5 md:mt-0"
          >
            <form
              id="langform"
              action="{{ route("language.change") }}"
              method="get"
              class="d-flex align-items-center justify-content-center"
            >
              <select
                id="small"
                class="w- block rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-brightPink focus:ring-brightPink"
                name="lang"
                id="lang"
                onchange="this.form.submit()"
              >
                <option disabled>{{ __("layoutApp.choose_language") }}</option>
                <option
                  value="es"
                  @if (session('locale') == 'es') selected @endif
                >
                  {{ __("layoutApp.spanish") }}
                </option>
                <option
                  value="en"
                  @if (session('locale') == 'en') selected @endif
                >
                  {{ __("layoutApp.english") }}
                </option>
              </select>
            </form>
          </div>
          <ul
            class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 rtl:space-x-reverse"
          >
            <li>
              <a
                href="{{ route("home.index") }}"
                class="block rounded px-3 py-2 text-gray-900 hover:bg-palePink md:p-0 md:hover:bg-transparent md:hover:text-brightPink"
              >
                {{ __("layoutApp.home") }}
              </a>
            </li>
            <li>
              <a
                href="{{ route("product.index") }}"
                class="block rounded px-3 py-2 text-gray-900 hover:bg-palePink md:p-0 md:hover:bg-transparent md:hover:text-brightPink"
              >
                {{ __("layoutApp.products") }}
              </a>
            </li>
            <li>
              <a
                href="{{ route("petProduct.index") }}"
                class="block rounded px-3 py-2 text-gray-900 hover:bg-palePink md:p-0 md:hover:bg-transparent md:hover:text-brightPink"
              >
                {{ __("layoutApp.pet_products") }}
              </a>
              @auth
                @if (auth()->check() &&auth()->user()->getRole() == "customer")
                  <li>
                    <a
                      href="{{ route("product.recommended") }}"
                      class="block rounded px-3 py-2 text-gray-900 hover:bg-palePink md:p-0 md:hover:bg-transparent md:hover:text-brightPink"
                    >
                      {{ __("layoutApp.recommended") }}
                    </a>
                  </li>
                @endif
              @endauth
            </li>
          </ul>
          @guest
            <div class="mx-4 my-2 flex justify-center">
              <a href="{{ route("login") }}">
                <button
                  class="rounded-full bg-brightPink px-4 py-2 font-bold text-white hover:bg-black hover:text-white"
                >
                  {{ __("layoutApp.get_started") }}
                </button>
              </a>
            </div>
          @else
            <div class="mx-5 my-2 flex justify-center">
              <div class="flex items-center space-x-4">
                <div class="relative">
                  <input type="checkbox" id="dropdown-toggle" class="hidden" />
                  <label
                    for="dropdown-toggle"
                    class="cursor-pointer text-white"
                  >
                    <div
                      class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-darkGray hover:bg-palePink"
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
                    class="absolute right-0 z-20 mt-2 hidden w-48 rounded-md bg-white shadow-lg group-hover:block"
                  >
                    @if (auth()->check() &&auth()->user()->getRole() == "admin")
                      <a
                        href="{{ route("admin.index") }}"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200"
                      >
                        {{ __("admin.admin") }}
                      </a>
                    @endif

                    <a
                      href="{{ route("profile.index") }}"
                      class="block px-4 py-2 text-gray-800 hover:bg-gray-200"
                    >
                      {{ __("auth.profile") }}
                    </a>
                    <form
                      action="{{ route("logout") }}"
                      method="POST"
                      class="block"
                    >
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
          @endguest
          @if (auth()->check() &&auth()->user()->getRole() == "customer")
            <div class="flex justify-center">
              <div
                class="mx-2 flex h-10 w-10 items-center justify-center rounded-full border-2 border-darkGray hover:bg-palePink"
              >
                <a
                  href="{{ route("cart.index") }}"
                  class="text-darkGray hover:text-black"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 256 256"
                    id="shopping-cart"
                  >
                    <rect width="256" height="256" fill="none" />
                    <path
                      fill="none"
                      stroke="#000"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="12"
                      d="M184,184H69.81818L41.92162,30.56892A8,8,0,0,0,34.05066,24H16"
                    />
                    <circle
                      cx="80"
                      cy="204"
                      r="20"
                      fill="none"
                      stroke="#000"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="12"
                    />
                    <circle
                      cx="184"
                      cy="204"
                      r="20"
                      fill="none"
                      stroke="#000"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="12"
                    />
                    <path
                      fill="none"
                      stroke="#000"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="12"
                      d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48"
                    />
                  </svg>
                </a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </nav>
    <main class="mx-12 my-12">
      @if (! empty($viewData["breadcrumbs"]))
        <x-breadcrumbs :breadcrumbs="$viewData['breadcrumbs']" />
      @endif

      @yield("content")
    </main>
    <footer class="bg-brightPink p-4 shadow">
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
