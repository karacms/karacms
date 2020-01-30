@extends('layouts.app')

@section('sidebar')
    @include('sidebars/attributes')
@endsection

@section('content')
<h1 class="text-2xl">Content Type 
    <a href="{{url('dashboard/attributes/create')}}" class="text-base font-medium border border-gray-200 px-2 py-1 rounded-sm">Create</a>
</h1>

<table class="w-full mt-6 border border-gray-200">
    <thead>
        <tr>
            <th>Type</th>
            <th>Slug</th>
            <th>Content Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($types->count())
        @foreach ($types as $type)
        <tr>
            <td>{{$type->name}}</td>
            <td>{{$type->slug}}</td>
            <td>0</td>
            <td>Delete</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="py-4 border border-t border-gray-200" colspan="4">
                <div class="text-center text-gray-500">No Custom Content Type</div>
            </td>
        </tr>
        @endif
    </tbody>
</table>
@endsection