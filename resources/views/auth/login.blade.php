@extends('layouts.app')

@section('content')
<div class="max-w-screen-lg mx-auto my-12">
    <div class="bg-white shadow-md rounded-lg">
        <div class="px-6 py-8">
            <h2 class="text-2xl font-bold text-center">{{ __('auth.login') }}</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">{{ __('passwords.email_address') }}</label>
                    <input id="email" type="email" class="block w-full p-3 border border-gray-300 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <span class="text-red-600 text-sm">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">{{ __('passwords.password') }}</label>
                    <input id="password" type="password" class="block w-full p-3 border border-gray-300 rounded-lg @error('password') is-invalid @enderror" name="password" required>

                    @error('password')
                        <span class="text-red-600 text-sm">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="text-gray-700" for="remember">{{ __('auth.remember_me') }}</label>
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black">
                        {{ __('auth.login') }}
                    </button>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-sm text-brightPink hover:text-black" href="{{ route('password.request') }}">
                        {{ __('passwords.forgot') }}
                    </a>
                @endif
            </form>
        </div>

        <div class="bg-gray-100 text-center py-4">
            <span>{{ __('auth.account_register') }}</span>
            <a href="{{ route('register') }}" class="text-brightPink font-bold hover:text-black">
                {{ __('auth.register') }}
            </a>
        </div>
    </div>
</div>
@endsection