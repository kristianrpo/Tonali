@extends("layouts.app")
@section("title", __("error.404_title"))
@section("content")
    <section class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1
                    class="text-primary-600 mb-4 text-7xl font-extrabold tracking-tight lg:text-9xl"
                >
                    {{ __("error.404_title") }}
                </h1>
                <p class="mb-4 text-lg font-light text-gray-500">
                    {{ __("error.404_message") }}
                </p>
                <a
                    href="{{ route("home.index") }}"
                    class="hover:bg-primary-800 focus:ring-primary-300 my-4 inline-flex rounded-lg bg-brightPink px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4"
                >
                    {{ __("error.back_home_button") }}
                </a>
            </div>
        </div>
    </section>
@endsection
