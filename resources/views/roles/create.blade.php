@extends('layouts.app')

@section('sidebar')
    @include('sidebars/users')
@endsection

@section('content')
    <h1 class="text-2xl text-cyan-500">Create Role</h1>

    <form method="POST" action="{{url('/dashboard/roles')}}">
        @include('roles/_form')
    </form>
@endsection
