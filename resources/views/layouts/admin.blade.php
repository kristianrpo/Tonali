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
        <title>@yield("title", __("layoutApp.admin_title"))</title>

        @vite("resources/css/app.css")
    </head>

    <body class="flex min-h-screen flex-col">
        <nav class="border-gray-200 bg-white shadow-md">
            <div
                class="mx-auto flex max-w-screen-xl cursor-pointer flex-wrap items-center justify-around p-4"
            >
                <div
                    class="flex items-center space-x-3 hover:text-brightPink rtl:space-x-reverse"
                >
                    <img
                        src="{{ asset("img/logos/dark/icon.png") }}"
                        class="h-12"
                        alt="{{ __("layoutApp.icon_alt") }}"
                    />
                    <span
                        class="self-center whitespace-nowrap text-2xl font-semibold"
                    >
                        {{ __("layoutApp.navbar_admin_title") }}
                    </span>
                </div>
                
                <div
                    class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto"
                    id="navbar-search"
                >
                    <ul
                        class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 rtl:space-x-reverse"
                    >
                        <li>
                            <a
                                href="#"
                                class="block rounded px-3 py-2 text-gray-900 hover:bg-palePink md:p-0 md:hover:bg-transparent md:hover:text-brightPink"
                            >
                                {{ __("layoutApp.home") }}
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route("admin.product.create") }}"
                                class="block rounded px-3 py-2 text-gray-900 hover:bg-palePink md:p-0 md:hover:bg-transparent md:hover:text-brightPink"
                            >
                                {{ __("layoutApp.create_product") }}
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
                    </ul>
                    <div class="mx-10 my-2 flex justify-center">
                        <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="checkbox" id="dropdown-toggle" class="hidden" />
                            <label for="dropdown-toggle" class="text-white cursor-pointer">
                                <div class="flex items-center justify-center h-10 w-10 rounded-full border-2 border-darkGray hover:bg-palePink">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 512 512" id="profile">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M256 250.8a73.34 73.34 0 1 1 73.33-73.34A73.41 73.41 0 0 1 256 250.8zm0-125.53a52.2 52.2 0 1 0 52.19 52.19A52.25 52.25 0 0 0 256 125.27zm117.07 282.6H138.93l-10.57-10.57a127.64 127.64 0 1 1 255.28 0zM150 386.73h212a106.51 106.51 0 0 0-212 0z" />
                                    </svg>
                                </div>
                            </label>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden group-hover:block">
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">{{ __('auth.profile') }}</a>
                                <form action="{{ route('logout') }}" method="POST" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-200">{{ __('auth.logout') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main class="mx-12 my-12">
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
                <hr class="mx-auto my-6 my-8 border-offWhite" />
                <span class="block text-center text-sm font-bold text-offWhite">
                    {{ __("layoutApp.copyright") }}
                </span>
            </div>
        </footer>
    </body>
</html>
