@extends('layouts.app')

@section('sidebar')
    @include('sidebars/content')
@endsection

@section('content')

@if (isset($content['id']))
<h1 class="text-2xl">Edit {{$contentTypeData['name']}}</h1>
@else
<h1 class="text-2xl">Create New {{$contentTypeData['name']}}</h1>
@endif

<form @submit="saveContent()" name="mainEditorForm" method="post" action="{{url('dashboard/content/' . $content->id ?? '' )}}">
    
    @if (isset($content['id']))
        @method('PUT')
    @endif

    @csrf

    <input type="hidden" name="type" value="{{$contentTypeData['slug']}}" />
    <input type="hidden" name="creator_id" value="{{Auth::user()->id}}" />

    {!! App\Forms\Form::render(['fields' => $contentTypeData['fields'], 'data' => $content]) !!}
</form>
@endsection