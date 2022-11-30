<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->get();
        $permission = new Permission;

        return view('backend.permissions.index', compact('permissions', 'permission'));
    }



    public function store()
    {
        request()->validate([
            'name' => 'required|string|unique:permissions,name|min:3',
        ]);


        Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        toast('Data Berhasil Ditambahkan', 'success');

        return back();
    }



    public function edit($id)
    {
        $permission = Permission::findOrFail(decrypt($id));
        $permissions = Permission::orderBy('created_at', 'desc')->get();

        return view('backend.permissions.edit', compact('permission', 'permissions'));
    }



    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required|string|unique:permissions,name|min:3',
            'guard_name' => 'required|string|min:3',
        ]);

        if ($permission->update(request()->all())) {
            toast('Data Berhasil Diupdate', 'success');
            return redirect()->route('permission.index');
        } else {
            toast('Data Gagal Diupdate', 'error');
            return back();
        }
    }



    public function destroy($id)
    {
        $permission = Permission::find(decrypt($id));
        $permission->delete();

        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('permission.index');
    }


    public function trash()
    {
        $permissions = Permission::onlyTrashed()->get();
        return view('backend.permissions.trash', compact('permissions'));
    }


    public function restore($id = null)
    {
        if ($id != null) {
            $id = Permission::onlyTrashed()->where('id', $id)->restore();
        } else {
            $id = Permission::onlyTrashed()->restore();
        }

        toast('Data Berhasil Direstore Semua', 'success');
        return back();
    }


    public function delete($id = null)
    {
        if ($id != null) {
            $id = Permission::onlyTrashed()->where('id', $id)->forceDelete();
        } else {
            $id = Permission::onlyTrashed()->forceDelete();
        }

        toast('Data Berhasil Dihapus Permanen', 'success');
        return back();
    }
}
