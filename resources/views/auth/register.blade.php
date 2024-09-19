@extends('layouts.app')

@section('content')
<div class="max-w-screen-lg mx-auto my-12">
    <div class="bg-white shadow-md rounded-lg">
        <div class="px-6 py-8">
            <h2 class="text-2xl font-bold text-center">{{ __('auth.register') }}</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">{{ __('auth.name') }}</label>
                    <input id="name" type="text" class="block w-full p-3 border border-gray-300 rounded-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                    @error('name')
                        <span class="text-red-600 text-sm">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">{{ __('passwords.email_address') }}</label>
                    <input id="email" type="email" class="block w-full p-3 border border-gray-300 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

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
                    <label for="password-confirm" class="block text-gray-700">{{ __('passwords.confirm_title') }}</label>
                    <input id="password-confirm" type="password" class="block w-full p-3 border border-gray-300 rounded-lg" name="password_confirmation" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-brightPink text-white py-2 px-4 rounded-full hover:bg-black">
                        {{ __('auth.register') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-gray-100 text-center py-4">
            <span>{{ __('auth.account_login') }}</span>
            <a href="{{ route('login') }}" class="text-brightPink font-bold hover:text-black">
                {{ __('auth.login') }}
            </a>
        </div>
    </div>
</div>
@endsection
