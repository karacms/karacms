@extends('layouts.guest')

@section('content')
<div class="lg:w-3/12 sm:w-5/12 align-middle mx-auto mt-32">

    <form class="bg-gray-800 p-6 shadow-md" method="POST" action="{{ route('register') }}">
        <div class="text-3xl">{{ __('Register') }}</div>
        @csrf

        <fieldset class="mt-4">
            <label for="name">{{ __('Name') }}</label>

            <input id="name" type="text" class="w-full mt-1 bg-gray-700 px-2 py-1 rounded-sm  @error('name') border border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </fieldset>

        <fieldset class="mt-4">
            <label for="email">{{ __('Email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="w-full mt-1 bg-gray-700 px-2 py-1 rounded-sm @error('email') border border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </fieldset>

        <fieldset class="mt-4">
            <label for="password">{{ __('Password') }}</label>


            <input id="password" type="password" class="w-full mt-1 bg-gray-700 px-2 py-1 rounded-sm  @error('password') border border-red-500 @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </fieldset>

        <fieldset class="mt-4">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="w-full mt-1 bg-gray-700 px-2 py-1 rounded-sm " name="password_confirmation" required autocomplete="new-password">
        </fieldset>

        <div class="mt-4 flex justify-between">
            <button type="submit" class="bg-pink-800 rounded-sm px-2 py-1 hover:bg-pink-700 hover:text-gray-400">
                {{ __('Register') }}
            </button>

            <a href="{{url('login')}}" class="border border-gray-700 px-2 py-1 rounded-sm hover:bg-gray-900 hover:text-gray-400">
                Already have account? Login
            </a>
        </div>
    </form>
</div>
@endsection