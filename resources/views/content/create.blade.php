@extends('layouts.app')

@section('sidebar')

@endsection

@section('content')
<h1 class="text-2xl">Create New {{$contentTypeData['name']}}</h1>

<div class="flex mt-6">
    <div class="flex-auto mr-6">
        @foreach ($contentTypeData['fields'] as $field)
            @if ($field['position'] === 'main')
            <fieldset>
                <label>{{$field['title']}}</label>
                <input type="text" class="border border-gray-200 px-2 py-1 rounded-sm w-full" />
            </fieldset>
            @endif
        @endforeach
    </div>

    <aside style="max-width: 300px">
        @foreach ($contentTypeData['fields'] as $field)
            @if ($field['position'] === 'sidebar')
            <fieldset>
                <label>{{$field['title']}}</label>
                <input type="text" class="border border-gray-200 px-2 py-1 rounded-sm w-full" />
            </fieldset>
            @endif
        @endforeach
    </aside>
</div>

@endsection