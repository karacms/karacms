@extends('layouts.app')

@section('content')
    <h1>Create Role</h1>

    <form method="POST" action="{{url('/dashboard/roles')}}" class="row">
        @include('roles/_form')
    </form>
@endsection