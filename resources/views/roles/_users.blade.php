<div class="col-12 mt-4">
    <h3>Users</h3>

    <ul>
    @if ($role->users->count() === 0)
        <li>No user in this group</li>
    @else
        @foreach ($role->users as $user)
            <li>{{$user->email}}</li>
        @endforeach
    @endif
    </ul>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#invite-modal">
        Add Users
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="invite-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                    <input type="text" name="add-user" placeholder="Search..." v-model="search" @input="performSearch()" class="form-control" />
                    <ul>
                        <li v-for="user in users" class="px-4 py-2 cursor-pointer" @click="addToQueue(user)">@{{user.email}}</li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul>
                        <li v-for="(user, index) in queue" class="px-4 py-2 cursor-pointer" @click="removeFromQueue(index, user)">@{{user.email}}</li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="queue" v-model="queue" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      
</div>