@extends('layouts.app')

@section('sidebar')
  @include('sidebars/profile')
@endsection

@section('content')
    <form method="POST" action="{{url('dashboard/users/' . $user->id)}}" class="md:w-4/12 sm:w-full">
        @method('PUT')

        @include('users/_general')

        <fieldset class="mt-10">
            <button type="submit" class="bg-indigo-500 text-white rounded-sm p-2">Update</button>
            <a href="{{url('dashboard/users')}}" title="Go back" class="ml-3 text-indigo-500">Back</a>
        </fieldset>
    </form>
@endsection