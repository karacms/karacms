@csrf
<fieldset class="mt-4">
    <label for="name">Name</label>
    <input type="text" class="mt-1 w-full p-2 border border-gray-300 hover:border-gray-400 rounded-sm" name="name" id="name" value="{{$user->name}}" />
</fieldset>

<fieldset class="mt-4">
    <label for="email">Email</label>
    <input type="email" class="mt-1 w-full p-2 border border-gray-300 hover:border-gray-400 rounded-sm" name="email" id="email" value="{{$user->email}}" />
</fieldset>

<fieldset class="mt-4">
    <label for="role">Role</label>
    <select name="role" id="role" class="w-full bg-white mt-1 p-2 h-10 border border-gray-300 hover:border-gray-400 rounded-sm">
        @foreach ($roles as $role)
        <option value="{{$role->id}}" {{isset($userRoles) && isset($userRoles[$role->id]) ? 'selected' : ''}}>{{$role->name}}</option>
        @endforeach
    </select>
</fieldset>

<fieldset class="mt-4">
    <label for="password">Password</label>
    <input type="password" class="mt-1 w-full p-2 border border-gray-300 hover:border-gray-400 rounded-sm" name="password" id="password" />
</fieldset>

<fieldset class="mt-4">
    <label for="password_confirmation">Password Confirmation</label>
    <input type="password" class="mt-1 w-full p-2 border border-gray-300 hover:border-gray-400 rounded-sm" name="password_confirmation" id="password_confirmation" />
</fieldset>