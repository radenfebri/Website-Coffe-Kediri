<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ManajemenUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }

    public function index()
    {
        $roles = Role::get();
        $users = User::has('roles')->get();

        return view('backend.users.index', compact('users', 'roles'));
    }


    public function change_password($id)
    {
        $user = User::findOrFail(decrypt($id));
        return view('backend.users.change-password', compact('user'));
    }


    public function update_password(Request $request, $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8|string',
            'password_confirmation' => 'required|min:8|string|same:password',
        ]);

        $user = User::findOrFail($user);
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        toast('Password berhasil diubah', 'success');
        return redirect()->route('user.index');
    }


    public function status_akun($id)
    {
        $user = User::findOrFail(decrypt($id));
        $user->update([
            'status' => $user->status == 1 ? 0 : 1,
        ]);

        toast('Status akun berhasil diubah', 'success');
        return redirect()->route('user.index');
    }
}
