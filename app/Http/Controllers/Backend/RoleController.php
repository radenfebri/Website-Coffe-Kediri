<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        $roles =  Role::orderBy('created_at', 'desc')->get();
        $role = new Role;
        $no_action = Role::where('name', 'Super Admin')->get();

        return view('backend.roles.index', compact('roles', 'role', 'no_action'));
    }



    public function store()
    {
        request()->validate([
            'name' => 'required|string|unique:roles,name|min:2',
        ]);

        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        toast('Role berhasil ditambahkan', 'success');
        return back();
    }



    public function edit($id)
    {
        $role = Role::findOrFail(decrypt($id));
        $roles = Role::orderBy('created_at', 'desc')->get();
        $no_action = Role::where('name', 'Super Admin')->get();

        return view('backend.roles.edit', compact('role', 'roles', 'no_action'));
    }



    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required|string|unique:roles,name|min:2',
            'guard_name' => 'string|min:3',
        ]);

        if ($role->update(request()->all())) {
            toast('Role berhasil diupdate', 'success');
            return redirect()->route('role.index');
        } else {
            toast('Role gagal diupdate', 'error');
            return back();
        }
    }



    public function destroy($id)
    {
        Role::destroy(decrypt($id));

        toast('Data Berhasil Dihapus', 'success');

        return redirect()->route('role.index');
    }


    public function trash()
    {
        $roles = Role::onlyTrashed()->get();
        return view('admin.roles.trash', compact('roles'));
    }


    public function restore($id = null)
    {
        if ($id != null) {
            $id = Role::onlyTrashed()->where('id', $id)->restore();
        } else {
            $id = Role::onlyTrashed()->restore();
        }

        toast('Data Berhasil Direstore Semua', 'success');
        return back();
    }


    public function delete($id = null)
    {
        if ($id != null) {
            $id = Role::onlyTrashed()->where('id', $id)->forceDelete();
        } else {
            $id = Role::onlyTrashed()->forceDelete();
        }

        toast('Data Berhasil Dihapus Permanen', 'success');
        return back();
    }
}
