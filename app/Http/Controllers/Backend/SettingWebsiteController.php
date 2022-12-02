<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingWebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function setting_info_website()
    {
        $setting_web = SettingWebsite::first();

        return view('backend.setting-website.index', compact('setting_web'));
    }


    public function setting_info_website_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
        ]);

        $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
        $image = $request->file('image')->storeAs('image-setting-website', $imageName);
        SettingWebsite::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'image' => $image,
        ]);

        toast('Setting Website Berhasil Ditambahkan', 'success');
        return back();
    }


    public function setting_info_website_update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
        ]);

        if (empty($request->file('image'))) {
            $setting_website = SettingWebsite::findOrFail($id);
            $setting_website->update([
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
            ]);

            toast('Setting Website Berhasil Diubah', 'success');
            return back();
        } else {
            $setting_website = SettingWebsite::findOrFail($id);
            $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('image-setting-website', $imageName);
            Storage::delete($setting_website->image);
            $setting_website->update([
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'image' => $image,
            ]);
        }
        toast('Setting Website Berhasil Diubah', 'success');
        return back();
    }
}
