<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Rating;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $produks = Produk::latest()->where('is_active', 1)->paginate(12);
        $ratings = Rating::all();

        return view('frontend.shop.index', compact('kategoriproduk_nav', 'produks', 'ratings'));
    }
}
