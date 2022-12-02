<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutAndContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }

    // --------------------------------------------------------- CONTROLLER ABOUT COMPANY ------------------------------------- //
    public function about_company()
    {
        $about_company = About::first();

        return view('backend.about-company.index', compact('about_company'));
    }

    public function about_company_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
        ]);

        $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
        $image = $request->file('image')->storeAs('image-about', $imageName);
        About::create([
            'title1' => $request->title1,
            'title2' => $request->title2,
            'deskripsi' => $request->deskripsi,
            'image' => $image,
        ]);

        toast('About Berhasil Ditambahkan', 'success');
        return back();
    }

    public function about_company_update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
        ]);

        if (empty($request->file('image'))) {
            $about_company = About::findOrFail($id);
            $about_company->update([
                'title1' => $request->title1,
                'title2' => $request->title2,
                'deskripsi' => $request->deskripsi,
            ]);

            toast('About Berhasil Diubah', 'success');
            return back();
        } else {
            $about_company = About::findOrFail($id);
            $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('image-about', $imageName);
            Storage::delete($about_company->image);
            $about_company->update([
                'title1' => $request->title1,
                'title2' => $request->title2,
                'deskripsi' => $request->deskripsi,
                'image' => $image,
            ]);
        }
        toast('About Berhasil Diubah', 'success');
        return back();
    }
}
