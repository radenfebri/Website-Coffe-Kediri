<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\PromosiNavbar;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $promosi_navbar = PromosiNavbar::where('status', 1)->get();
        $setting_website = SettingWebsite::first();

        return view('frontend.contact.index', compact('kategoriproduk_nav', 'setting_website','promosi_navbar'));
    }
}
