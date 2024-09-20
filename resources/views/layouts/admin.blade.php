@extends("layouts.app")
@section("content")
    <div class="flex">
        <button
            data-drawer-target="default-sidebar"
            data-drawer-toggle="default-sidebar"
            aria-controls="default-sidebar"
            type="button"
            class="ml-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden"
        >
            <span class="sr-only">Open sidebar</span>
            <svg
                class="h-6 w-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                ></path>
            </svg>
        </button>

        <aside
            id="default-sidebar"
            class="w-64 overflow-y-auto bg-white transition-transform"
        >
            <div class="px-0 py-0">
                <ul class="space-y-2">
                    <li>
                        <a
                            href="#"
                            class="group flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100"
                        >
                            <svg
                                aria-hidden="true"
                                class="h-6 w-6 text-gray-400 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                ></path>
                                <path
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                ></path>
                            </svg>
                            <span class="ml-3">
                                {{ __("product.overview") }}
                            </span>
                        </a>
                    </li>
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

        <div class="flex-1 p-4">
            @yield("admin-content")
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.js"></script>
@endsection
