<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\MultiImage;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function __construct()
    {
    }

    public function index($slug)
    {
        if (Produk::where('slug', $slug)->where('is_active', 1)->exists()) {
            $produk = Produk::where('slug', $slug)->first();
            $images = MultiImage::where('prod_id', $produk->id)->get();
            $kategoriproduk = KategoriProduk::all();

            return view('frontend.detail.index', compact('produk', 'images'));
        } else {
        }
    }
}
