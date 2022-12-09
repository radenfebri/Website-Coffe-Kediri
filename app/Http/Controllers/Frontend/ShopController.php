<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\PromosiNavbar;
use App\Models\Rating;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $produks = Produk::latest()->where('is_active', 1)->where('qty','>=',1)->paginate(12);
        $ratings = Rating::all();
        $promosi_navbar = PromosiNavbar::where('status', 1)->get();
        $setting_website = SettingWebsite::first();

        return view('frontend.shop.index', compact('kategoriproduk_nav', 'setting_website','produks', 'ratings', 'promosi_navbar'));
    }
}
