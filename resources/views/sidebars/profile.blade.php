<div class="px-5 py-3">
    <h1 class="text-2xl">Edit User</h1>

    <div class="avatar w-32 mt-6">
        <img src="{{$user->getAvatar()}}" alt="Avatar" width="120" height="120" />
        <!-- <button class="w-full bg-gray-600 z-10 p-3 text-gray-200" type="button" data-toggle="modal" data-target="#avatar-modal">
            Change Avatar
        </button> -->

        <h2 class="mt-2 text-xl">{{$user->display_name}}</h2>
    </div>

    <ul class="mt-6">
        @foreach ($tabs as $name => $title)
        <li class="mt-2 text-gray-{{$activeTab === $name ? '200' : '400' }}"><a href="{{ url('/dashboard/users/' . $user->id . '?tab=' . $name) }}">{{$title}}</a></li>
        @endforeach
    </ul>
</div>