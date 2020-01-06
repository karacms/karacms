@extends('layouts.guest')

@section('content')
<div class="lg:w-3/12 sm:w-5/12 align-middle mx-auto mt-32">

    <form class="bg-gray-800 p-6 shadow-md" method="POST" action="{{ route('login') }}">
        <div class="text-3xl">{{ __('Login') }}</div>
        @csrf

        <fieldset class="mt-4">
            <label for="email" class="">{{ __('Email') }}</label>

            <input id="email" type="email" class="w-full mt-1 bg-gray-700 px-2 py-1 rounded-sm @error('email') border-red-500 border @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>

        <fieldset class="mt-4">
            <label for="password" class="">{{ __('Password') }}</label>

                <input id="password" type="password" class="w-full mt-1 bg-gray-700 px-2 py-1 rounded-sm @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </fieldset>

        <fieldset class="mt-4">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </fieldset>


        <div class="mt-4 flex justify-between">
            <button type="submit" class="bg-pink-800 rounded-sm px-2 py-1 hover:bg-pink-700 hover:text-gray-400">
                {{ __('Login') }}
            </button>
            
            <a
        href="{{url('register')}}"
        class="border border-gray-700 px-2 py-1 rounded-sm hover:bg-gray-900 hover:text-gray-400"
      >
        Register
      </a>
        </div>
    </form>

    <div class="flex">
        @if (Route::has('password.request'))
            <a class="text-center text-gray-500 mt-5 px-6" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
</div>
@endsection