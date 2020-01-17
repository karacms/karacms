@extends('layouts.app')

@section('sidebar')
  @include('sidebars/profile')
@endsection

@section('content')
    <form method="POST" action="{{url('dashboard/users' . $user->id)}}" class="md:w-4/12 sm:w-full">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @method('PUT')
        <fieldset class="mt-4">
            <label for="name">Name</label>
            <input type="text" class="w-full p-2 rounded-sm border-gray-300 border mt-1" name="name" id="name" value="{{$user->name}}" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="email">Email</label>
            <input type="email" class="w-full p-2 rounded-sm border-gray-300 border mt-1" name="email" id="email" value="{{$user->email}}" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="password">Password</label>
            <input type="password" class="w-full p-2 rounded-sm border-gray-300 border mt-1" name="password" id="password" />
        </fieldset>

        <fieldset class="mt-4">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="w-full p-2 rounded-sm border-gray-300 border mt-1" name="password_confirmation" id="password_confirmation" />
        </fieldset>

        <fieldset class="mt-10">
            <button type="submit" class="bg-cyan-500 text-white rounded-sm p-2">Update</button>
            <a href="{{url('dashboard/users')}}" title="Go back" class="ml-3 text-cyan-500">Back</a>
        </fieldset>
    </form>
@endsection
