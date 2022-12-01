<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Rating;
use App\Models\Slide;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index()
    {
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $kategoriproduk = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $slide = Slide::where('status', 1)->latest()->get();
        $produk_populer = Produk::latest()->where('popular', 1)->get();
        $produks = Produk::latest()->where('is_active', 1)->limit(8)->get();
        $ratings = Rating::all();


        return view('frontend.home.index', compact('kategoriproduk_nav', 'produks', 'produk_populer', 'kategoriproduk', 'ratings', 'slide'));
    }


    public function search()
    {
        $produk = Produk::select('name')->where('is_active', 1)->get();
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
