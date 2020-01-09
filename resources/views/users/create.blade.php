@extends('layouts.app')

@section('sidebar')
    @include('sidebars/users')
@endsection

@section('content')
    <h1 class="text-xl">Create User</h1>
    
    <form method="POST" action="{{url('dashboard/users')}}" class="mt-4 w-4/12">
        @csrf
        <fieldset class="mt-4">
            <label for="name">Name</label>
            <input type="text" class="bg-gray-600 mt-1 text-gray-200 w-full py-1 px-2 rounded-sm" name="name" id="name" value="{{$user->name}}" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="email">Email</label>
            <input type="email" class="bg-gray-600 mt-1 text-gray-200 w-full py-1 px-2 rounded-sm" name="email" id="email" value="{{$user->email}}" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="password">Password</label>
            <input type="password" class="bg-gray-600 mt-1 text-gray-200 w-full py-1 px-2 rounded-sm" name="password" id="password" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="bg-gray-600 mt-1 text-gray-200 w-full py-1 px-2 rounded-sm" name="password_confirmation" id="password_confirmation" />
        </fieldset>

        <fieldset class="mt-10">
            <button type="submit" class="rounded-sm bg-pink-800 text-gray-200 px-2 py-1">Create</button>
            <a href="{{url('dashboard/users')}}" title="Go back" class="text-blue-300 ml-2">Back</a>
        </fieldset>
    </form>
@endsection