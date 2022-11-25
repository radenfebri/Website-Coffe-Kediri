<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\MultiImage;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($slug)
    {
        if (Produk::where('slug', $slug)->where('is_active', 1)->exists()) {
            $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
            $produk = Produk::where('slug', $slug)->first();
            $images = MultiImage::where('prod_id', $produk->id)->get();
            $kategori = KategoriProduk::where('is_active', 1)->limit(8)->get();
            $kategoriproduk = Produk::where('kategori_id', $produk->id)->latest()->limit(4)->get();
            $newproduk = Produk::where('is_active', 1)->latest()->limit(3)->get();

            return view('frontend.detail-produk.index', compact('produk', 'images', 'kategoriproduk', 'kategori', 'newproduk', 'kategoriproduk_nav'));
        } else {
        }
    }
}
