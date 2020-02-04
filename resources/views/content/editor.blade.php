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

{!! $form->render() !!}
@endsection