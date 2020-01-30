@extends('layouts.app')

@section('sidebar')
    @include('sidebars/attributes')
@endsection

@section('content')
<h1 class="text-2xl">Create Content Type</h1>

<form method="post" action="{{url('/dashboard/attributes')}}">
    @csrf

    <div class="w-4/12">
        <fieldset class="mt-4">
            <label>Content Type</label>
            <input type="text" placeholder="Content Type" class="w-full border border-gray-200 p-2 rounded-sm mt-1" />
        </fieldset>

        <fieldset class="mt-4">
            <label>Slug</label>
            <input type="text" placeholder="Slug" class="w-full border border-gray-200 p-2 rounded-sm mt-1" />
        </fieldset>

        <fieldset class="mt-4">
            <label>Description</label>

            <textarea placeholder="Content type description..." class="w-full border border-gray-200 p-2 rounded-sm mt-1"></textarea>
        </fieldset>
    </div>

    <h2 class="text-xl mt-10">Fields</h2>

    <div class="flex mt-2">
        <div class="w-2/12 border border-gray-200 p-4">
            <h3>Basics</h3>

            <ul class="mt-4">
                <li class="mt-2">
                    <button @click="addField('text')" type="button" class="w-full rounded border border-gray-200 rounded px-3 py-1">Text</button>
                </li>

                <li class="mt-2">
                    <button type="button" class="w-full rounded border border-gray-200 rounded px-3 py-1">Text Area</button>
                </li>

                <li class="mt-2">
                    <button type="button" class="w-full rounded border border-gray-200 rounded px-3 py-1">Email</button>
                </li>
                
                <li class="mt-2">
                    <button type="button" class="w-full rounded border border-gray-200 rounded px-3 py-1">Password</button>
                </li>
            </ul>
        </div>
        <div class="w-10/12 px-3">
            <h3 class="text-xl">Drag to reorder</h3>
            @{{fields}}

            <ul>
                <li class="mt-2" v-for="field of fields" keyBy="field.key">
                    <div class="field-edit">
                        <header class="bg-gray-300 px-2 py-1">
                            <small>@{{field.type}}</small>
                        </header>

                        <div>
                            <fieldset class="mt-2">
                                <label>Key</label>
                                <input class="w-full mt-2 px-2 py-1 border border-gray-200 rounded-sm" placeholder="Enter key" />
                            </fieldset>

                            <fieldset class="mt-2">
                                <label>Default</label>
                                <input class="w-full mt-2 px-2 py-1 border border-gray-200 rounded-sm" placeholder="Enter default value" />
                            </fieldset>

                            <fieldset class="mt-2">
                                <label>Required?</label>
                                <input type="checkbox" name="required" />
                            </fieldset>

                            <fieldset class="mt-2">
                                <label>Unique</label>
                                <input type="checkbox" name="unique" />
                            </fieldset>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</form>
@endsection