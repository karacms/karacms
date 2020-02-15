@extends('layouts.app')

@section('content')
    <h1>Edit Media</h1>

    <form method="post" action="{{url('dashboard/media/' . $file->id)}}">
        @method('PUT')
        @csrf

        <div class="flex mt-6">
            <section class="media-form w-5/12 mr-6">
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

                @if (isset($file->url))
                <fieldset class="mt-3">
                    <label>URL</label>
                    <input disabled type="text" value="{{url($file->url)}}" class="w-full bg-gray-100 px-2 py-1 text-gray-600" />
                </fieldset>
                @endif

                @if (isset($file->meta['size']) && is_numeric($file->meta['size']))
                <fieldset class="mt-3">
                    <label>Size</label>
                    <input disabled type="text" value="{{number_format($file->meta['size'] / 1024 / 1024, 2)}} MB" class="w-full bg-gray-100 px-2 py-1 text-gray-600" />
                </fieldset>
                @endif

                @if (isset($file->meta['width']) && isset($file->meta['height']))
                <fieldset class="mt-3">
                    <h4>Dimensions</h4>
                    <input disabled type="text" value="{{$file->meta['width'] ?? 0}} px" class="bg-gray-100 px-2 py-1 text-gray-600" /> :
                    <input disabled type="text" value="{{$file->meta['height'] ?? 0}} px" class="bg-gray-100 px-2 py-1 text-gray-600" />
                </fieldset>
                @endif

                @if (isset($file->meta['playtime_string']))
                <fieldset class="mt-3">
                    <h4>Duration</h4>
                    <input disabled type="text" value="{{$file->meta['playtime_string'] ?? 0}}" class="w-full bg-gray-100 px-2 py-1 text-gray-600" /> 
                </fieldset>
                @endif

                <div class="mt-5">
                    <button class="px-2 py-1 rounded-sm bg-blue-400 text-white">Save Changes</button>
                    <a class="px-2 py-1 rounded-sm border border-gray-500 text-gray-500" href="{{url('dashboard/media')}}">Go Back</a>
                </div>
            </section>
            
            <section class="media-preview flex-1">
                <h3>Preview</h3>

                @if ($file->isImage())
                <img class="max-w-full" src="{{url($file->url)}}" alt="{{$file->title}}" />
                @endif

                @if ($file->isAudio())
                <audio class="w-full" controls src="{{url($file->url)}}"></audio>
                @endif

                @if($file->isVideo())
                <video controls class="w-full">
                    <source src="{{url($file->url)}}" type="{{$file->type}}" />
                </video>
                @endif
            </section>
        </div>
        
    </form>
@endsection