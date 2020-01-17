<div class="flex">
    <div class="w-4/12">
        @csrf
        <fieldset class="mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="w-full border-gray-300 border p-2 rounded-sm" value="{{$role->name}}" id="name" />
        </fieldset>

        <fieldset class="mt-3">
            <label for="description">Description</label>
            <textarea name="description" class="w-full border-gray-300 border p-2 rounded-sm" id="description" rows="3">{{$role->description}}</textarea>
        </fieldset>

        <fieldset class="mt-3">
            <button type="submit" class="bg-cyan-500 rounded-sm text-white p-2">Save Changes</button>
        </fieldset>
    </div>

    <div class="w-8/12 ml-6">
        <h3 class="text-xl">Permissions</h3>

        @foreach ($permissions as $section)
        <h4 class="mt-6">{{$section['title']}}</h4>
        <div class="w-full my-3">
            <div class="flex-column space-between">
                @foreach($section['permissions'] as $permission => $label)
                <div>
                    <label class="text-sm text-gray-500">
                        <input type="checkbox" name="permissions[{{$permission}}]" value="1" {{ (isset($role) && isset($role->permissions[$permission]) && $role->permissions[$permission] == true ) ? 'checked' : '' }}> {{ $label }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    <input type="hidden" name="type" value="role" />
</div>
