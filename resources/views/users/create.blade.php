@extends('layouts.app')

@section('sidebar')
    @include('sidebars/users')
@endsection

@section('content')
    <h1 class="text-2xl">Create User</h1>

    <form method="POST" action="{{url('dashboard/users')}}" class="mt-4 w-4/12">
        @csrf
        <fieldset class="mt-4">
            <label for="name">Name</label>
            <input type="text" class="mt-1 w-full p-2 border border-gray-300 hover:border-gray-400 rounded-sm" name="name" id="name" value="{{$user->name}}" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="email">Email</label>
            <input type="email" class="mt-1 w-full p-2 border border-gray-300 hover:border-gray-400 rounded-sm" name="email" id="email" value="{{$user->email}}" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="password">Password</label>
            <input type="password" class="mt-1 w-full p-2 border border-gray-300 hover:border-gray-400 rounded-sm" name="password" id="password" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="mt-1 w-full p-2 border border-gray-300 hover:border-gray-400 rounded-sm" name="password_confirmation" id="password_confirmation" />
        </fieldset>

        <fieldset class="mt-10">
            <button type="submit" class="rounded-sm bg-cyan-500 text-white p-2">Create</button>
            <a href="{{url('dashboard/users')}}" title="Go back" class="text-cyan-500 ml-2">Back</a>
        </fieldset>
    </form>
@endsection
