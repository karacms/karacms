@extends('layouts.app')

@section('content')
    <h1>Edit Media</h1>

    <form method="post" action="{{url('dashboard/media/' . $file->id)}}">
        @method('PUT')
        @csrf

        <div class="flex mt-6">
            <section class="media-form w-4/12 mr-6">
                <fieldset>
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$file->title}}" class="px-2 py-1 rounded-sm w-full border border-gray-200" placeholder="Media title" />
                </fieldset>

                <fieldset class="mt-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="px-2 py-1 rounded-sm w-full border border-gray-200" placeholder="Media description" rows="3">{{$file->description}}</textarea>
                </fieldset>

                <fieldset class="mt-3">
                    <h4 for="tags">Tags</h4>
                    @foreach ($allTags as $tag)
                    <label class="color-checklist mr-3">
                        <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, $fileTags) ? 'checked' : ''}} />
                        <span class="bg-{{$tag->slug}}-300 border-{{$tag->slug}}-500"></span>
                    </label>
                    @endforeach
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