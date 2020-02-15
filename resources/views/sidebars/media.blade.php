<div class="p-6">
    <h2 class="text-2xl">Media Library</h2>

    <h2 class="text-base mt-4 text-gray-400">Kinds</h2>

    <ul class="mt-2">
        <li><a href="{{request()->fullUrlWithQuery(['bar' => 'Baz'])}}">Images</a></li>
        <li>Audio</li>
        <li>Videos</li>
        <li>Documents</li>
        <li>Others</li>
        <li>Mine</li>
    </ul>

    <h2 class="text-base mt-4 text-gray-400">Tags</h2>

    <ul class="mt-2">
        @foreach ($allTags as $tag)
        <li class="text-gray-600 mt-1">
            <a href="{{request()->fullUrlWithQuery(['tag' => $tag->slug])}}">
                <span class="inline-block w-3 h-3 bg-{{$tag->slug}}-400 border border-{{$tag->slug}}-500 rounded-full"></span> {{$tag->name}}
            </a>
        </li>
        @endforeach
    </ul>
</div>