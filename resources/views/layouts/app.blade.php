<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/52165e5e88.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <title>@yield('title', __('app.title'))</title>

    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-white border-gray-200 shadow-md">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-around mx-auto p-4 cursor-pointer">
            <div class="flex items-center space-x-3 rtl:space-x-reverse hover:text-brightPink">
                <img src="{{ asset('img/logos/dark/icon.png') }}" class="h-12" alt="{{ __('app.icon_alt') }}" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">{{ __('app.navbar_title') }}</span>
            </div>
            <div class="flex md:order-1">
                <div class="relative hidden md:block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <form action="{{ route('product.search') }}" method="GET" class="flex items-center">
                        <input type="text" id="search-navbar"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-palePink focus:border-palePink"
                            placeholder="{{ __('app.search') }}" name="query">
                    </form>
                </div>
                <button data-collapse-toggle="navbar-search" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-darkGray hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-search" aria-expanded="false">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="search-navbar"
                        class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-palePink focus:border-palePink"
                        placeholder="{{ __('app.search') }}">
                </div>
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-palePink md:hover:bg-transparent md:hover:text-brightPink md:p-0">
                            {{ __('app.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-palePink md:hover:bg-transparent md:hover:text-brightPink md:p-0">
                            {{ __('app.about') }}
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-palePink md:hover:bg-transparent md:hover:text-brightPink md:p-0">
                            {{ __('app.products') }}
                        </a>
                    </li>
                </ul>
                @guest
                    <div class="my-2 mx-4 flex justify-center">
                        <button
                            class="bg-brightPink text-white hover:bg-black hover:text-white font-bold py-2 px-4 rounded-full">
                            {{ __('app.get_started') }}
                        </button>
                    </div>
                @else
                    <div class="my-2 mx-10 flex justify-center">
                        <div class="flex items-center space-x-4">
                            <a href="#" class="text-darkGray hover:text-black">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full border-2 border-darkGray hover:bg-palePink">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 512 512"
                                        id="profile">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M256 250.8a73.34 73.34 0 1 1 73.33-73.34A73.41 73.41 0 0 1 256 250.8zm0-125.53a52.2 52.2 0 1 0 52.19 52.19A52.25 52.25 0 0 0 256 125.27zm117.07 282.6H138.93l-10.57-10.57a127.64 127.64 0 1 1 255.28 0zM150 386.73h212a106.51 106.51 0 0 0-212 0z" />
                                    </svg>
                                </div>
                            </a>
                            <a href="#" class="text-darkGray hover:text-black ">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full border-2 border-darkGray hover:bg-palePink">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 256 256"
                                        id="shopping-cart">
                                        <rect width="256" height="256" fill="none" />
                                        <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="12"
                                            d="M184,184H69.81818L41.92162,30.56892A8,8,0,0,0,34.05066,24H16" />
                                        <circle cx="80" cy="204" r="20" fill="none" stroke="#000"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="12" />
                                        <circle cx="184" cy="204" r="20" fill="none" stroke="#000"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="12" />
                                        <path fill="none" stroke="#000" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="12"
                                            d="M62.54543,144H188.10132a16,16,0,0,0,15.74192-13.13783L216,64H48" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="rounded-lg shadow mt-12 bg-brightPink">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="flex items-center justify-center">
                <img src="{{ asset('img/logos/light/combinationMark.png') }}" class="h-60"
                    alt="{{ __('app.combination_mark_alt') }}" />
            </div>
            <hr class="my-6 border-offWhite mx-auto my-8" />
            <span class="block text-sm text-offWhite text-center font-bold"> {{ __('app.copyright') }} </span>
        </div>
    </footer>
</body>

</html>
