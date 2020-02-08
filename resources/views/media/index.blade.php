@extends('layouts.app')

@section('sidebar')
    @include('sidebars/media')
@endsection

@section('content')
<h1>Media <a href="#" class="text-base px-2 py-1 bg-blue-500 text-white rounded-sm align-middle">{!! svg('line/upload') !!} Upload</a></h1>

<div class="uppy"></div>

<table class="mt-6 w-full border border-gray-200">
    <thead>
        <tr>
            <th><input type="checkbox" /></th>
            <th>File Name</th>
            <th>File Type</th>
            <th>Uploaded</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @if ($media->count() === 0)
        <tr>
            <td colspan="5">No media. Start upload with the form above.</td>
        </tr>
        @else
            @foreach ($media as $file)
            <tr>
                <td><input type="checkbox" /></td>
                <td>
                    @if (\Str::startsWith($file->type, 'image/'))

                    @endif
                    {{$file->title}}
                </td>
                <td>{{$file->type}}</td>
                <td>{{$file->created_at}}</td>
                <td>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
