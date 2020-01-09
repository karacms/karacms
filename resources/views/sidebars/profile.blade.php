<div class="px-5 py-3">
    <div class="relative w-full mt-3">
        <img src="{{$user->getAvatar()}}" alt="Avatar" width="200" height="200" class="rounded" />
        <button class="absolute bottom-0 ml-3 mb-2 bg-gray-800 py-1 px-2 rounded-sm text-sm opacity-75">Edit</button>
    </div>

    <h1 class="mt-2 text-2xl">{{$user->display_name}}</h1>

    <ul class="mt-6">
        @foreach ($tabs as $name => $title)
        <li class="mt-2 text-gray-{{$activeTab === $name ? '200' : '400' }}"><a href="{{ url('/dashboard/users/' . $user->id . '?tab=' . $name) }}">{{$title}}</a></li>
        @endforeach
    </ul>
</div>