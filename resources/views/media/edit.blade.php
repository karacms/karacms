@extends('layouts.app')

@section('content')
    <h1>Edit Media</h1>

    <form method="post" action="{{url('dashboard/media/' . $file->id)}}">
        @method('UPDATE')
        @csrf

        <div class="flex mt-6">
            <section class="media-form w-4/12 mr-6">
                <fieldset>
                    <label for="title">Title</label>
                    <input type="text" class="px-2 py-1 rounded-sm w-full border border-gray-200" placeholder="Media title" />
                </fieldset>

                <fieldset class="mt-3">
                    <label for="description">Description</label>
                    <textarea class="px-2 py-1 rounded-sm w-full border border-gray-200" placeholder="Media description" rows="3"></textarea>
                </fieldset>

                <fieldset class="mt-3">
                    <h4 for="tags">Tags</h4>
                    <label class="color-checklist mr-3"><input type="checkbox" name="" checked /><span class="bg-blue-300 border-blue-500"></span></label>
                    <label class="color-checklist mr-3"><input type="checkbox" name="" /><span class="bg-red-300 border-red-500"></span></label>
                    <label class="color-checklist mr-3"><input type="checkbox" name="" /><span class="bg-yellow-300 border-yellow-500"></span></label>
                    <label class="color-checklist mr-3"><input type="checkbox" name="" /><span class="bg-brown-300 border-brown-500"></span></label>
                    <label class="color-checklist mr-3"><input type="checkbox" name="" /><span class="bg-orange-300 border-orange-500"></span></label>
                    <label class="color-checklist mr-3"><input type="checkbox" name="" checked /><span class="bg-green-300 border-green-500"></span></label>
                    <label class="color-checklist mr-3"><input type="checkbox" name="" /><span class="bg-purple-300 border-purple-500"></span></label>
                    <label class="color-checklist mr-3"><input type="checkbox" name="" /><span class="bg-teal-300 border-teal-500"></span></label>
                </fieldset>

                <div class="mt-5">
                    <button class="px-2 py-1 rounded-sm bg-blue-400 text-white">Save Changes</button>
                    <a class="px-2 py-1 rounded-sm border border-gray-500 text-gray-500" href="{{url('dashboard/media')}}">Go Back</a>
                </div>
            </section>
            
            <section class="media-preview">
                <h3>Preview</h3>

                @if ($file->isImage())
                <img class="max-w-full" src="{{url($file->url)}}" alt="{{$file->title}}" />
                @endif
            </section>
        </div>
        
    </form>
@endsection