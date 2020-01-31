<div class="p-6">
    <h1 class="text-2xl">Content</h1>

    <h2 class="text-sm text-gray-400 mt-5">Content Types <a href="#" class="bg-orange-500 px-1 rounded-sm text-white">+</a></h2>
    <ul>
    @foreach (\App\Content::getAllTypes() as $type)
        <li class="mt-3"><a class="text-gray-500" href="{{url('dashboard/content?type=' . $type['slug'])}}">{{$type['name']}}</a></li>
    @endforeach
    </ul>

    <h2 class="text-sm text-gray-400 mt-5">Content Groups <a href="#" class="bg-orange-500 px-1 rounded-sm text-white">+</a></h2>
    <ul>
        <li class="mt-3"><a class="text-gray-500" href="#">Category</a></li>
    </ul>
</div>