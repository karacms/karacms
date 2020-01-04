@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <form method="POST" action="{{url('dashboard/users' . $user->id)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" />
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" />
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url('dashboard/users')}}" title="Go back" class="btn btn-outline-secondary">Back</a>
        </div>
    </form>
@endsection