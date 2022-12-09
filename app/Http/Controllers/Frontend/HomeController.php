<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerPromosi;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\PromosiNavbar;
use App\Models\Rating;
use App\Models\SettingWebsite;
use App\Models\Slide;
use App\Models\TigaPromosi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $kategoriproduk = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $slide = Slide::where('status', 1)->latest()->get();
        $produk_populer = Produk::latest()->where('popular', 1)->where('qty','>=',1)->get();
        $produks = Produk::latest()->where('is_active', 1)->where('qty','>=',1)->limit(8)->get();
        $banner_promosi = BannerPromosi::where('status', 1)->first();
        $tiga_promosi = TigaPromosi::where('status', 1)->latest()->limit(3)->get();
        $promosi_navbar = PromosiNavbar::where('status', 1)->get();
        $setting_website = SettingWebsite::first();
        $ratings = Rating::all();


        return view('frontend.home.index', compact('kategoriproduk_nav', 'setting_website', 'promosi_navbar', 'tiga_promosi', 'produks', 'produk_populer', 'kategoriproduk', 'ratings', 'slide', 'banner_promosi'));
    }


    public function search()
    {
        $produk = Produk::select('name')->where('is_active', 1)->where('qty','>=',1)->get();
        $data = [];

        foreach ($produk as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }



    public function searchproduk(Request $request)
    {
        $search_produk = $request->produk_name;

        if ($search_produk != "") {
            $produk = Produk::where("name", "LIKE", "%$search_produk%")->where('is_active', 1)->first();
            if ($produk) {
                return redirect('detail-produk/' . $produk->slug);
            } else {
                return back()->with('error', 'Produk Tidak dapat Ditemukan');
            }
        } else {
            return back()->with('error', 'Produk Tidak dapat Ditemukan');
        }
    }
}
