@extends('layouts.app')

@section('sidebar')
  @include('sidebars/users')
@endsection

@section('content')
    <header>
    <h1 class="text-2xl text-cyan-500 inline">All Users</h1>
    <a href="{{url('dashboard/users/create') }}" class="border-gray-300 border rounded text-base px-2 py-1 ml-1">Create</a>
    </header>
    <table class="w-full mt-6 border border-gray-200">
        <thead>
            <tr class="border-b border-gray-200">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr class="border-b border-gray-200">
                <td>{{$user->id}}</td>
                <td><a class="text-cyan-500" title="Go to {{$user->name}}'s profile" href="{{url('/dashboard/users/' . $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    <form method="POST" action="{{url('/dashboard/users/' . $user->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="rounded-sm border border-red-500 px-2 py-1">Delete</button>
                        <a class="rounded-sm border border-gray-400 py-1 px-2" href="{{url('/dashboard/users/' . $user->id)}}" title="Edit">Edit</a>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
