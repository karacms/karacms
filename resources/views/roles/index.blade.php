@extends('layouts.app')

@section('content')
<h1 class="text-3xl">Roles <a href="{{url('dashboard/roles/create')}}" class="rounded-sm bg-gray-400 text-gray-900 px-4 text-base py-1" title="Create new role">Create</a></h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Role</th>
            <th>Description</th>
            <th>Users Count</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @if ($roles->count() === 0)
        <tr>
            <td colspan="4">
                <div class="text-center">No role. Consider <a href="{{url('dashboard/roles/create')}}" title="Create new role" class="btn btn-primary btn-sm">Create new one</a></div>
            </td>
        </tr>
        @else
        @foreach ($roles as $role)
        <tr>
            <td><a href="{{url('/dashboard/roles/'. $role->id) }}" title="Edit role {{$role->name}}">{{$role->name}}</a></td>
            <td>{{$role->description}}</td>
            <td>{{$role->users->count()}}</td>
            <td>
                <form method="POST" action="{{url('/dashboard/roles/' . $role->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-danger">Delete</button>    
                    <a class="btn btn-outline-secondary btn-sm" href="{{url('/dashboard/roles/' . $role->id)}}" title="Edit Role">Edit</a>
                </form>
            </td>
        <tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection