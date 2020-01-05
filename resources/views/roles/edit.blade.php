@extends('layouts.app')

@section('content')
    <h1>Update Role</h1>

    <ul class="nav nav-tabs">
        @foreach ($tabs as $key => $value)
        <li class="nav-item">
            <a class="nav-link {{$key === $currentTab ? 'active' : ''}}" href="?tab={{$key}}">{{$value}}</a>
        </li>
        @endforeach
    </ul>

    <form method="POST" action="{{url('/dashboard/roles/' . $role->id)}}" class="row">
        @method('PUT')
        
        @if ($currentTab === 'general')
            @include('roles/_form')
        @else
            @include('roles/_users')
        @endif
    </form>
@endsection