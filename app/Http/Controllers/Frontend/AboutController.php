<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\PromosiNavbar;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $promosi_navbar = PromosiNavbar::where('status', 1)->get();
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();

        return view('frontend.about.index', compact('kategoriproduk_nav', 'promosi_navbar'));
    }
}
