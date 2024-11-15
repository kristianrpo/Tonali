@extends("layouts.app")

@section("content")
  <div class="mx-auto my-12 max-w-screen-lg">
    <div class="rounded-lg bg-white shadow-md">
      <div class="px-6 py-8">
        <h2 class="text-center text-2xl font-bold">
          {{ __("auth.login") }}
        </h2>

        <form method="POST" action="{{ route("login") }}">
          @csrf

          <div class="mb-4">
            <label for="email" class="block text-gray-700">
              {{ __("passwords.email_address") }}
            </label>
            <input
              id="email"
              type="email"
              class="@error("email") is-invalid @enderror block w-full rounded-lg border border-gray-300 p-3"
              name="email"
              value="{{ old("email") }}"
              required
              autofocus
            />

            @error("email")
              <span class="text-sm text-red-600">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="password" class="block text-gray-700">
              {{ __("passwords.password") }}
            </label>
            <input
              id="password"
              type="password"
              class="@error("password") is-invalid @enderror block w-full rounded-lg border border-gray-300 p-3"
              name="password"
              required
            />

            @error("password")
              <span class="text-sm text-red-600">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="mb-4">
            <input
              class="form-check-input"
              type="checkbox"
              name="remember"
              id="remember"
              {{ old("remember") ? "checked" : "" }}
            />
            <label class="text-gray-700" for="remember">
              {{ __("auth.remember_me") }}
            </label>
          </div>

          <div class="mb-4">
            <button
              type="submit"
              class="w-full rounded-full bg-brightPink px-4 py-2 text-white hover:bg-black"
            >
              {{ __("auth.login") }}
            </button>
          </div>
        </form>
      </div>

      <div class="bg-gray-100 py-4 text-center">
        <span>{{ __("auth.account_register") }}</span>
        <a
          href="{{ route("register") }}"
          class="font-bold text-brightPink hover:text-black"
        >
          {{ __("auth.register") }}
        </a>
      </div>
    </div>
  </div>
@endsection
