<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        $slide = Slide::latest()->get();
        return view('backend.slide.index', compact('slide'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);


        $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
        $image = $request->file('image')->storeAs('image-slider', $imageName);
        Slide::create([
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'image' => $image,
            'button_text' => $request->button_text,
            'status' => $request->status == TRUE ? '1' : '0',
        ]);

        toast('Slide Berhasil Ditambahkan', 'success');
        return back();
    }


    public function edit($id)
    {
        $slide = Slide::findOrFail(decrypt($id));
        return view('backend.slide.edit', compact('slide'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if (empty($request->file('image'))) {
            $slide = Slide::findOrFail($id);
            $slide->update([
                'title1' => $request->title1,
                'title2' => $request->title2,
                'title3' => $request->title3,
                'deskripsi' => $request->deskripsi,
                'link' => $request->link,
                'button_text' => $request->button_text,
                'status' => $request->status,
            ]);

            toast('Slide Berhasil Diubah', 'success');
            return redirect()->route('slider.index');
        } else {
            $slide = Slide::findOrFail($id);
            $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('image-slider', $imageName);
            Storage::delete($slide->image);
            $slide->update([
                'title1' => $request->title1,
                'title2' => $request->title2,
                'title3' => $request->title3,
                'deskripsi' => $request->deskripsi,
                'link' => $request->link,
                'button_text' => $request->button_text,
                'status' => $request->status,
                'image' => $image,
            ]);
        }
        toast('Slide Berhasil Diubah', 'success');
        return redirect()->route('slider.index');
    }



    public function destroy($id)
    {
        $slide = Slide::findOrFail(decrypt($id));
        Storage::delete($slide->image);
        $slide->delete();

        toast('Slide Berhasil Dihapus', 'success');
        return back();
    }
}
