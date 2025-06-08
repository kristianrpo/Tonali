@extends("layouts.app")

@section("content")
  <section class="bg-white mb-[100px]">
    <div
      class="mx-auto grid max-w-screen-xl px-4 pb-8 pt-20 lg:grid-cols-12 lg:gap-8 lg:py-16 lg:pt-10 xl:gap-0"
    >
      <div class="mr-auto place-self-center lg:col-span-7">
        <h1
          class="mb-4 max-w-2xl text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl"
        >
          {{ __("home.call_to_action_title") }}
        </h1>
        <p
          class="mb-6 max-w-2xl font-light text-gray-500 md:text-lg lg:mb-8 lg:text-xl"
        >
          {{ __("home.description_call_to_action") }}
        </p>
        <div class="w-300 space-y-4 sm:flex sm:space-x-4 sm:space-y-0">
          <a href="{{ route("product.index") }}">
            <button
              class="rounded-full bg-brightPink px-4 py-2 font-bold text-white hover:bg-black hover:text-white"
            >
              {{ __("home.button_call_to_action") }}
            </button>
          </a>
        </div>
      </div>
      <div class="hidden lg:col-span-5 lg:mt-0 lg:flex">
        <img
          src="{{ asset("img/home/makeup.png") }}"
          alt="{{ __("home.makeup") }}"
        />
      </div>
    </div>
  </section>

  <section class="bg-white mb-[100px]">
    <div
      class="grid grid-cols-2 gap-8 text-gray-500 sm:grid-cols-3 sm:gap-12 lg:grid-cols-5"
    >
      <img
        class="mx-auto h-auto w-28 object-contain"
        src="//ateneaprofesional.com/cdn/shop/files/dgggza.png?crop=center&height=90&v=1709563128&width=825"
        alt="Atenea"
      />
      <img
        class="mx-auto h-auto w-28 object-contain"
        src="https://cibermake.com/wp-content/uploads/2023/04/Cibermakelogo.webp"
        alt="Cyber Make"
      />
      <img
        class="mx-auto h-auto w-28 object-contain"
        src="//www.rubyrose.com.co/cdn/shop/files/logo_Ruby_230x.png?v=1663948403"
        alt="Ruby Rose"
      />
      <img
        class="mx-auto h-auto w-20 object-contain"
        src="//kholcosmetics.com/cdn/shop/files/logo_khol_140x.jpg?v=1685921301"
        alt="Khöl Cosmetics"
      />
      <img
        class="mx-auto h-auto w-20 object-contain"
        src="//laboratoriosathos.com/cdn/shop/files/Logo_negro_sin_fondo.png?v=1644605066"
        alt="Athos"
      />
    </div>
  </section>

  <section class="mt-5 bg-white py-16 mb-[100px]">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
        {{ __("home.experience_title") }}
      </h2>
      <p class="mt-4 text-lg leading-6 text-gray-600">
        {{ __("home.experience_description") }}
      </p>
      <div
        class="mt-10 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-3"
      >
        <div class="flex flex-col items-center text-center">
          <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-pink-200 text-pink-600"
          ></div>
          <h3 class="mt-4 text-lg font-medium text-gray-900">
            {{ __("home.report_reviews_title") }}
          </h3>
          <p class="mt-2 text-sm text-gray-600">
            {{ __("home.report_reviews_description") }}
          </p>
        </div>
        <div class="flex flex-col items-center text-center">
          <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-200 text-blue-600"
          ></div>
          <h3 class="mt-4 text-lg font-medium text-gray-900">
            {{ __("home.personalized_recommendations_title") }}
          </h3>
          <p class="mt-2 text-sm text-gray-600">
            {{ __("home.personalized_recommendations_description") }}
          </p>
        </div>
        <div class="flex flex-col items-center text-center">
          <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-200 text-yellow-600"
          ></div>
          <h3 class="mt-4 text-lg font-medium text-gray-900">
            {{ __("home.searching_products_title") }}
          </h3>
          <p class="mt-2 text-sm text-gray-600">
            {{ __("home.searching_products_description") }}
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="mb-6 bg-white">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
        {{ __("home.signup_title") }}
      </h2>
      <p class="mt-4 text-lg text-gray-600">
        {{ __("home.signup_description") }}
      </p>
      <div class="mt-6">
        <a
          href="{{ route("login") }}"
          class="rounded-lg bg-brightPink px-6 py-3 text-lg font-medium text-white hover:bg-black hover:text-white"
        >
          {{ __("home.signup_button") }}
        </a>
      </div>
    </div>
  </section>
@endsection
