<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();

        return view('frontend.setting.index', compact('kategoriproduk_nav'));
    }

    public function updatedata(Request $request)
    {
        $request->validate([
            'email' => 'required|email|min:3|max:191|string|unique:users,email,' . auth()->user()->id,
            'name' => 'required|min:3|max:191|string',
            'no_hp' => 'required|min:10|max:30|string',
            'alamat' => 'required',
        ]);

        if ($request->email != auth()->user()->email) {
            User::whereId(auth()->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                $request->email == auth()->user()->email ? '' : 'email_verified_at' => null,
            ]);
        } else {
            User::whereId(auth()->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
        }

        return back()->with('status', 'Data berhasil diubah');
    }
}
