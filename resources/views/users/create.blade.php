@extends('layouts.app')

@section('sidebar')
    @include('sidebars/users')
@endsection

@section('content')
    <h1 class="text-2xl">Create User</h1>

    <form method="POST" action="{{url('dashboard/users')}}" class="mt-4 w-4/12">
        @include('users/_general')
        
        <fieldset class="mt-10">
            <button type="submit" class="rounded-sm bg-indigo-500 text-white p-2">Create</button>
            <a href="{{url('dashboard/users')}}" title="Go back" class="text-indigo-500 ml-2">Back</a>
        </fieldset>
    </form>
@endsection
