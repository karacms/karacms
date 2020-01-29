<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groups = Group::type('role')->pluck('name', 'id');
        $users = User::with('groups')->paginate(20);

        return frontend('users/index', compact('users', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $roles = Group::type('role')->get();

        return frontend('users/create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_filter($request->all());
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->groups()->attach($data['role']);

        return redirect(url('/dashboard/users/' . $user->id))->withMessage('User created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        return $this->edit($user, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        $roles = Group::type('role')->get();

        $tabs = [
            'general' => 'General',
            'attributes' => 'Attributes',
            'permissions' => 'Permissions'
        ];

        $activeTab = $request->tab ?? 'general';

        return frontend('users/edit', compact('user', 'tabs', 'activeTab', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = array_filter($request->all());

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }


        return back()->withMessage('User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Todo: Cannot delete higher role
        $user->delete();

        return back()->withMessage('User deleted!');
    }
}
