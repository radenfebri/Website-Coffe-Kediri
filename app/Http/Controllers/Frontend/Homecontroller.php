<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $kategoriproduk = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $produk_populer = Produk::latest()->where('popular', 1)->get();
        $produks = Produk::latest()->where('is_active', 1)->limit(8)->get();

        return view('frontend.home.index', compact('kategoriproduk', 'produks', 'produk_populer'));
    }
}
