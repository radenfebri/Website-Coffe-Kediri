<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('frontend.changePassword.index');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with('error', 'Password lama tidak sesuai');
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('status', 'Password berhasil diubah');
    }
}
