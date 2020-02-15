<div class="p-6">
    <h2 class="text-2xl">Media Library</h2>

    <h2 class="text-base mt-4 text-gray-400">Kinds</h2>

    <ul class="mt-2">
        <li><a href="{{request()->fullUrlWithQuery(['type' => 'image'])}}">Images</a></li>
        <li><a href="{{request()->fullUrlWithQuery(['type' => 'audio'])}}">Audio</a></li>
        <li><a href="{{request()->fullUrlWithQuery(['type' => 'video'])}}">Videos</a></li>
        <li><a href="{{request()->fullUrlWithQuery(['type' => 'document'])}}">Documents</a></li>
        <li><a href="{{request()->fullUrlWithQuery(['type' => 'others'])}}">Others</a></li>
        <li><a href="{{request()->fullUrlWithQuery(['type' => 'mine'])}}">Mine</a></li>
    </ul>

    <h2 class="text-base mt-4 text-gray-400">Tags</h2>

    <ul class="mt-2">
        <li class="text-gray-600 mt-1">
            <a href="{{request()->fullUrlWithQuery(['tag' => 0])}}">
                <span class="inline-block w-3 h-3 bg-gray-400 border border-gray-500 rounded-full"></span>
                <span class="inline-block w-3 h-3 bg-gray-400 border border-gray-500 rounded-full -ml-3"></span>
                All Tags
            </a>
        </li>
        @foreach ($allTags as $tag)
        <li class="text-gray-600 mt-1">
            <a href="{{request()->fullUrlWithQuery(['tag' => $tag->id])}}">
                <span class="inline-block w-3 h-3 bg-{{$tag->slug}}-400 border border-{{$tag->slug}}-500 rounded-full"></span> {{$tag->name}}
            </a>
        </li>
        @endforeach
    </ul>
</div>