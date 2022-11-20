<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AssignRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        $roles = Role::get();
        $users = User::has('roles')->get();
        $usersall = User::get();

        return view('backend.assign-role-to-user.index', compact('roles', 'users', 'usersall'));
    }



    public function store()
    {
        $user = User::where('email', request('email'))->first();
        $user->assignRole(request('roles'));

        // toast('Data Berhasil Ditambahkan', 'success');

        return back();
    }



    public function edit($id)
    {
        $user = User::findOrFail(decrypt($id));
        $roles = Role::get();
        $users = User::has('roles')->get();
        $usersall = User::get();

        return view('backend.assign-role-to-user.edit', compact('user', 'roles', 'users', 'usersall'));
    }



    public function update(User $user)
    {
        $user->syncRoles(request('roles'));

        // toast('Data Berhasil Diupdate', 'info');

        return redirect()->route('assignrole.index');
    }
}

