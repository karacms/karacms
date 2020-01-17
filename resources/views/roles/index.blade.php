@extends('layouts.app')

@section('sidebar')
@include('sidebars/users')
@endsection

@section('content')
<header>
    <h1 class="text-2xl text-cyan-500 inline">Roles</h1>
    <a href="{{url('dashboard/roles/create')}}" class="rounded-sm border-gray-300 border text-gray-900 px-4 text-base py-1 ml-1" title="Create new role">Create</a>
</header>

<table class="table w-full border mt-6">
    <thead>
        <tr class="border-b">
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
                <div class="text-center my-4">No role. Consider to <a href="{{url('dashboard/roles/create')}}" title="Create new role" class="px-2 py-1 bg-gray-300 rounded-sm">Create new one</a></div>
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
