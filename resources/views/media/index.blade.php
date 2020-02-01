@extends('layouts.app')

@section('sidebar')
@endsection

@section('content')
<h1>Media <a href="#" class="text-base px-2 py-1 bg-blue-500 text-white rounded-sm align-middle">{!! svg('line/upload') !!} Upload</a></h1>

<div id="drag-drop-area"></div>

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
        <tr></tr>
    </tbody>
</table>
@endsection