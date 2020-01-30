<div class="p-6">
    <h1 class="text-2xl">Content</h1>

    <ul class="mt-4">
    @foreach (\App\Content::getAllTypes() as $type)
        <li><a href="{{url('dashboard/content?type=' . $type['slug'])}}">{{$type['name']}}</a></li>
    @endforeach
    </ul>
</div>