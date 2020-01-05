<div class="col-6">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{$role->name}}" id="name" />  
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3">{{$role->description}}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</div>

    <div class="col-6 permissions">
        <h3>Permissions</h3>

        @foreach ($permissions as $section)
            <h4>{{$section['title']}}</h4>
            <div class="row my-3">
                <div class="col">
                    @foreach($section['permissions'] as $permission => $label)
                        <label class="label-thin col-md-4">
                            <input type="checkbox" name="permissions[{{$permission}}]"
                                   value="1" {{ (isset($role) && isset($role->permissions[$permission]) && $role->permissions[$permission] == true ) ? 'checked' : '' }}> {{ $label }}
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <input type="hidden" name="type" value="role" />