@extends("layouts.app")

@section("content")
    <div class="mx-auto my-12 max-w-screen-lg">
        <div class="rounded-lg bg-white shadow-md">
            <div class="px-6 py-8">
                <h2 class="text-center text-2xl font-bold">
                    {{ __("auth.register") }}
                </h2>

                <form method="POST" action="{{ route("register") }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">
                            {{ __("auth.name") }}
                        </label>
                        <input
                            id="name"
                            type="text"
                            class="@error("name") is-invalid @enderror block w-full rounded-lg border border-gray-300 p-3"
                            name="name"
                            value="{{ old("name") }}"
                            required
                            autofocus
                        />

                        @error("name")
                            <span class="text-sm text-red-600">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

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
                        <label
                            for="password-confirm"
                            class="block text-gray-700"
                        >
                            {{ __("passwords.confirm_title") }}
                        </label>
                        <input
                            id="password-confirm"
                            type="password"
                            class="block w-full rounded-lg border border-gray-300 p-3"
                            name="password_confirmation"
                            required
                        />
                    </div>

                    <div class="mb-4">
                        <button
                            type="submit"
                            class="w-full rounded-full bg-brightPink px-4 py-2 text-white hover:bg-black"
                        >
                            {{ __("auth.register") }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-gray-100 py-4 text-center">
                <span>{{ __("auth.account_login") }}</span>
                <a
                    href="{{ route("login") }}"
                    class="font-bold text-brightPink hover:text-black"
                >
                    {{ __("auth.login") }}
                </a>
            </div>
        </div>
    </div>
@endsection
