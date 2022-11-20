<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }

    public function index()
    {
        return view('backend.assign-permission-to-role.index', [
            'roles' => Role::orderBy('created_at', 'desc')->get(),
            'permissions' => Permission::orderBy('created_at', 'desc')->get(),
        ]);
    }


    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        // dd(request()->all());
        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        // toast('Data Berhasil Ditambahkan','success');

        return back();
    }


    public function edit($id)
    {
        $role = Role::findOrFail(decrypt($id));
        $roles = Role::orderBy('created_at', 'desc')->get();
        $permissions = Permission::orderBy('created_at', 'desc')->get();

        return view('backend.assign-permission-to-role.edit', compact('role', 'roles', 'permissions'));
    }
    

    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array',
        ]);

        $role->syncPermissions(request('permissions'));

        // toast('Data Berhasil Diupdate','info');

        return redirect()->route('assignpermission.index');

    }
}
