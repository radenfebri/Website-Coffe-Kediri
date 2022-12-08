<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
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
            'title1' => 'required',
            'title2' => 'required',
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

    // --------------------------------------------------------- CONTROLLER CONTACT COMPANY ------------------------------------- //

    public function contact_company()
    {
        $contact = Contact::latest()->get();

        return view('backend.contact.index', compact('contact'));
    }


    public function contact_company_show($id)
    {
        $contact = Contact::find(decrypt($id));

        return view('backend.contact.show', compact('contact'));
    }


    public function contact_company_destroy($id)
    {
        $contact = Contact::findOrFail(decrypt($id));
        $contact->delete();

        toast('Contact Berhasil Dihapus', 'success');
        return back();
    }
}
