@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <div class="avatar tw-w-32">
        <img src="{{$user->getAvatar()}}" alt="Avatar" width="120" height="120" />

        <button class="w-full tw-bg-gray-600 tw-z-10 tw-p-3 tw-text-gray-200" type="button" data-toggle="modal" data-target="#avatar-modal">
            Change Avatar
        </button>
    </div>

    <form method="POST" action="{{url('dashboard/users' . $user->id)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="avatar-modal-label">Change Avatar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <input type="file" name="avatar" accept="image/*" onchange="doPreview(this)" />
                    <img class="tw-mt-4" id="preview" src="#" alt="Avatar Preview" />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
              </div>
            </div>
          </div>
          
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" />
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" />
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url('dashboard/users')}}" title="Go back" class="btn btn-outline-secondary">Back</a>
        </div>
    </form>

  
@endsection