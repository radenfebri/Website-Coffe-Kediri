<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PromosiNavbar;
use App\Models\TigaPromosi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromosiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }

    // --------------------------------------------------------- CONTROLLER PROMOSI NAVBAR ------------------------------------- //
    public function promosi_navbar()
    {
        $promosi_navbar = PromosiNavbar::latest()->get();
        return view('backend.promosi-navbar.index', compact('promosi_navbar'));
    }


    public function promosi_navbar_store(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);

        PromosiNavbar::create([
            'title' => $request->title,
            'link' => $request->link,
            'button_text' => $request->button_text,
            'status' => $request->status == TRUE ? '1' : '0',
        ]);

        toast('Promosi Navbar Berhasil Ditambahkan', 'success');
        return back();
    }


    public function promosi_navbar_edit($id)
    {
        $promosi_navbar = PromosiNavbar::findOrFail(decrypt($id));
        return view('backend.promosi-navbar.edit', compact('promosi_navbar'));
    }


    public function promosi_navbar_update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $promosi_navbar = PromosiNavbar::findOrFail($id);
        $promosi_navbar->update([
            'title' => $request->title,
            'link' => $request->link,
            'button_text' => $request->button_text,
            'status' => $request->status,
        ]);


        toast('Promosi Navbar Berhasil Diubah', 'success');
        return redirect()->route('promosi-navbar.index');
    }


    public function promosi_navbar_destroy($id)
    {
        $promosi_navbar = PromosiNavbar::findOrFail(decrypt($id));
        $promosi_navbar->delete();

        toast('Promosi Navbar Berhasil Dihapus', 'success');
        return back();
    }


    // --------------------------------------------------------- CONTROLLER TIGA PROMOSI ------------------------------------- //
    public function tiga_promosi()
    {
        $tiga_promosi = TigaPromosi::latest()->get();
        return view('backend.tiga-promosi.index', compact('tiga_promosi'));
    }


    public function tiga_promosi_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);


        $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
        $image = $request->file('image')->storeAs('image-tiga-promosi', $imageName);
        TigaPromosi::create([
            'title1' => $request->title1,
            'title2' => $request->title2,
            'link' => $request->link,
            'image' => $image,
            'button_text' => $request->button_text,
            'status' => $request->status == TRUE ? '1' : '0',
        ]);

        toast('Tiga Promosi Berhasil Ditambahkan', 'success');
        return back();
    }


    public function tiga_promosi_edit($id)
    {
        $tiga_promosi = TigaPromosi::findOrFail(decrypt($id));
        return view('backend.tiga-promosi.edit', compact('tiga_promosi'));
    }


    public function tiga_promosi_update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if (empty($request->file('image'))) {
            $tiga_promosi = TigaPromosi::findOrFail($id);
            $tiga_promosi->update([
                'title1' => $request->title1,
                'title2' => $request->title2,
                'link' => $request->link,
                'button_text' => $request->button_text,
                'status' => $request->status  == TRUE ? '1' : '0',
            ]);

            toast('Tiga Promosi Diubah', 'success');
            return redirect()->route('tiga-promosi.index');
        } else {
            $tiga_promosi = TigaPromosi::findOrFail($id);
            $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('image-tiga-promosi', $imageName);
            Storage::delete($tiga_promosi->image);
            $tiga_promosi->update([
                'title1' => $request->title1,
                'title2' => $request->title2,
                'link' => $request->link,
                'button_text' => $request->button_text,
                'status' => $request->status  == TRUE ? '1' : '0',
                'image' => $image,
            ]);
        }
        toast('Tiga Promosi Diubah', 'success');
        return redirect()->route('tiga-promosi.index');
    }


    public function tiga_promosi_destroy($id)
    {
        $tiga_promosi = TigaPromosi::findOrFail(decrypt($id));
        Storage::delete($tiga_promosi->image);
        $tiga_promosi->delete();

        toast('Tiga Promosi Berhasil Dihapus', 'success');
        return back();
    }


    // --------------------------------------------------------- CONTROLLER BANNER PROMOSI ------------------------------------- //

}
