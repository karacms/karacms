<aside style="width: 280px" class="bg-gray-200 flex-shrink">
<div class="p-6">
    <div class="relative w-full mt-3">
        <form enctype="multipart/form-data" method="post" action="{{url('dashboard/users/' . $user->id)}}">
            @method('PUT')
            @csrf
            <img id="preview" src="{{$user->avatar}}" alt="Avatar" class="w-56 h-56 rounded object-cover" />
            <input onchange="doPreview(this)" id="avatar-upload" type="file" accept="image/*" hidden name="avatar" />
            <button type="button" id="edit-avatar" onclick="document.getElementById('avatar-upload').click()" class="absolute bottom-0 ml-3 mb-2 bg-gray-800 px-3 py-2 rounded-sm text-sm text-white opacity-75">Edit</button>
            <button type="submit" id="save-avatar" class="hidden absolute bottom-0 right-0 mb-2 px-3 py-2 mr-2 bg-indigo-400 text-white rounded-sm">Save</button>
        </form>
    </div>

    <h1 class="mt-2 text-2xl">{{$user->display_name}}</h1>

    <ul class="mt-6">
        @foreach ($tabs as $name => $title)
        <li class="mt-2 text-gray-{{$activeTab === $name ? '600' : '400' }}"><a href="{{ url('/dashboard/users/' . $user->id . '?tab=' . $name) }}">{{$title}}</a></li>
        @endforeach
    </ul>
</div>
</aside>
