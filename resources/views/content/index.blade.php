@extends('layouts.app')

@section('sidebar')
    @include('sidebars/content')
@endsection

@section('content')
<h1 class="text-2xl">{{$contentTypeData['name']}} 
    <a class="text-base rounded-sm border border-gray-300 px-3 py-1" href="{{url('/dashboard/content/create?type=' . $contentTypeData['slug'])}}">Create</a>
</h1>

<table class="w-full border mt-6">
    <thead>
        <tr>
            <th><input type="checkbox" /></th>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Last Updated</th>
        </tr>
    </thead>
    <tbody>
        @if ($contents->count() === 0)
        <tr>
            <td colspan="6" class="border-t border">
                <div class="text-center text-gray-500">
                    No post
                </div>
            </td>
        </tr>
        @else
        @foreach ($contents as $content)
        <tr>
            <td>{{$content->title}}</td>
            <td>{{$content->creator->name}}</td>
            <td>{{$content->status}}</td>
            <td>{{$content->created_at}}</td>
            <td>{{$content->updated_at}}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection