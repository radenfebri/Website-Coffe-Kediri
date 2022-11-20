<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);    
    }


    public function index()
    {
        abort_if(Gate::denies('role-index'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $roles =  Role::orderBy('created_at', 'desc')->get();
        $role = new Role;
        $no_action = Role::where('name', 'Super Admin')->get();

        return view('backend.roles.index', compact('roles', 'role', 'no_action'));
    }



    public function store()
    {
        request()->validate([
            'name' => 'required|string|unique:roles,name|min:2',
            'guard_name' => 'required|string|min:3',
        ]);

        if (Role::create(request()->all())) {
            // toast('Role berhasil ditambahkan', 'success');
            return back();
        } else {
            // toast('Role gagal ditambahkan', 'error');
            return back();
        }
    }



    public function edit($id)
    {
        abort_if(Gate::denies('role-edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $role = Role::findOrFail(decrypt($id));
        $roles = Role::orderBy('created_at', 'desc')->get();
        $no_action = Role::where('name', 'Super Admin')->get();

        return view('backend.roles.edit', compact('role', 'roles', 'no_action'));
    }



    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required|string|min:2',
            'guard_name' => 'required|string|min:3',
        ]);

        if ($role->update(request()->all())) {
            // toast('Role berhasil diupdate', 'success');
            return redirect()->route('role.index');
        } else {
            // toast('Role gagal diupdate', 'error');
            return back();
        }
    }



    public function destroy($id)
    {
        abort_if(Gate::denies('role-destroy'), Response::HTTP_FORBIDDEN, 'Forbidden');

        Role::destroy(decrypt($id));

        // toast('Data Berhasil Dihapus', 'success');

        return redirect()->route('role.index');
    }


    public function trash()
    {
        abort_if(Gate::denies('role-trash'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $roles = Role::onlyTrashed()->get();
        return view('admin.roles.trash', compact('roles'));
    }


    public function restore($id = null)
    {
        abort_if(Gate::denies('role-restore'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($id != null) {
            $id = Role::onlyTrashed()->where('id', $id)->restore();
        } else {
            $id = Role::onlyTrashed()->restore();
        }

        // toast('Data Berhasil Direstore Semua', 'success');
        return back();
    }


    public function delete($id = null)
    {
        abort_if(Gate::denies('role-delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($id != null) {
            $id = Role::onlyTrashed()->where('id', $id)->forceDelete();
        } else {
            $id = Role::onlyTrashed()->forceDelete();
        }

        // toast('Data Berhasil Dihapus Permanen', 'success');
        return back();
    }
}
