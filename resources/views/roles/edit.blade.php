@extends('layouts.app')

@section('sidebar')
  @include('sidebars/users')
@endsection

@section('content')
    <h1 class="text-2xl">Update Role</h1>

    <form method="POST" action="{{url('/dashboard/roles/' . $role->id)}}">
        @csrf
        @method('PUT')
        @include('roles/_form')
    </form>
@endsection
