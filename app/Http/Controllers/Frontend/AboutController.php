<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\KategoriProduk;
use App\Models\PromosiNavbar;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $promosi_navbar = PromosiNavbar::where('status', 1)->get();
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $setting_website = SettingWebsite::first();
        $about = About::first();

        return view('frontend.about.index', compact('kategoriproduk_nav', 'promosi_navbar', 'setting_website', 'about'));
    }


    public function contact_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'deskripsi' => 'required',
        ],[
            'name.required' => 'Nama Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'phone.required' => 'Nomer HP Tidak Boleh Kosong',
            'subject.required' => 'Subject Tidak Boleh Kosong',
            'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
        ]);

        Contact::create(request()->all());

        return back()->with('status', 'Terimakasih sudah mengisi form Contact, selanjutnya kami akan hubungi contact yang terkain.');
    }
}
