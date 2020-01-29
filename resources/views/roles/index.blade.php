@extends('layouts.app')

@section('sidebar')
@include('sidebars/users')
@endsection

@section('content')
<header>
    <h1 class="text-2xl inline">Roles</h1>
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
        <tr class="border border-b">
            <td colspan="4">
                <div class="text-center my-4">No role. Consider to <a href="{{url('dashboard/roles/create')}}" title="Create new role" class="px-2 py-1 bg-gray-300 rounded-sm">Create new one</a></div>
            </td>
        </tr>
        @else
        @foreach ($roles as $role)
        <tr class="border border-b">
            <td class="py-2"><a class="text-indigo-500" href="{{url('/dashboard/roles/'. $role->id) }}" title="Edit role {{$role->name}}">{{$role->name}}</a></td>
            <td class="py-2">{{$role->description}}</td>
            <td class="py-2">{{$role->users->count()}}</td>
            <td class="py-2">
                @if ($role->slug !== 'administrator')
                <form method="POST" action="{{url('/dashboard/roles/' . $role->id)}}" onsubmit="return confirm('This cannot be undone, do you want to continue?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-1 rounded-sm border-red-300 text-red-300 border">Delete</button>
                    <a class="p-1 rounded-sm border-gray-500 text-gray-500 border" href="{{url('/dashboard/roles/' . $role->id)}}" title="Edit Role">Edit</a>
                </form>
                @endif
            </td>
        <tr>
            @endforeach
            @endif
    </tbody>
</table>
@endsection
