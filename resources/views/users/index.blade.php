@extends('layouts.app')

@section('content')
    <h1>Users <a href="{{url('dashboard/users/create') }}" class="btn btn-sm btn-outline-secondary">Create</a></h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a title="Go to {{$user->name}}'s profile" href="{{url('/dashboard/users/' . $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    <form method="POST" action="{{url('/dashboard/users/' . $user->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-sm btn-danger">Delete</button>
                        <a class="btn btn-outline-secondary btn-sm" href="{{url('/dashboard/users/' . $user->id)}}" title="Edit">Edit</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection