<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Group::whereType('role')->get();

        return view('roles/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = config('permissions');

        $role = new Group([
            'type' => 'role'
        ]);

        return view('roles/create', compact('role', 'permissions'));
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
        $data['slug'] = Str::slug($data['name']);
        
        $role = Group::create($data);
        
        return redirect('dashboard/roles/' . $role->id)->withMessage('Role created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $role, Request $request)
    {
        return $this->edit($role, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $role, Request $request)
    {
        $permissions = config('permissions');

        $tabs = [
            'general' => 'General',
            'users' => 'Users'
        ];

        $currentTab = isset($request->tab) && $tabs[$request->tab] ? $request->tab : 'general';

        return view('roles/edit', compact('role', 'permissions', 'tabs', 'currentTab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $role)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $role->update($data);
        
        return redirect('dashboard/roles/' . $role->id)->withMessage('Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
