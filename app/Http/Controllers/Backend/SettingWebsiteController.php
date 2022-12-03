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
            'favicon' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
        ]);

        $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
        $imageFavicon = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('favicon')->getClientOriginalName();
        $image = $request->file('image')->storeAs('image-setting-website', $imageName);
        $favicon = $request->file('favicon')->storeAs('image-setting-website', $imageFavicon);
        SettingWebsite::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'image' => $image,
            'favicon' => $favicon,
        ]);

        toast('Setting Website Berhasil Ditambahkan', 'success');
        return back();
    }


    public function setting_info_website_update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
        ]);

        if ($id) {
            $setting_website = SettingWebsite::findOrFail($id);
            $setting_website->address = $request->address;
            $setting_website->phone = $request->phone;
            $setting_website->email = $request->email;
            $setting_website->facebook = $request->facebook;
            $setting_website->instagram = $request->instagram;
            $setting_website->youtube = $request->youtube;

            if (!empty($request->file('image'))) {
                if (isset($setting_website->image)) {
                    Storage::delete($setting_website->image);
                }

                $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
                $image = $request->file('image')->storeAs('image-setting-website', $imageName);
                $setting_website->image = $image;
            }

            if (!empty($request->file('favicon'))) {
                if (isset($setting_website->favicon)) {
                    Storage::delete($setting_website->favicon);
                }

                $imageFavicon = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('favicon')->getClientOriginalName();
                $favicon = $request->file('favicon')->storeAs('image-setting-website', $imageFavicon);
                $setting_website->favicon = $favicon;
            }

            $setting_website->save();
            toast('Setting Website Berhasil Diubah', 'success');
            return back();
        } else {
            toast('Setting Website Gagal Diubah', 'error');
            return back();
        }
    }
}
