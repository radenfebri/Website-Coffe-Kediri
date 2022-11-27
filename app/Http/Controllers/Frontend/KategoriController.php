<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $produks = Produk::latest()->where('is_active', 1)->paginate(12);

        return view('frontend.kategori.index', compact('kategoriproduk_nav', 'produks'));
        
    }
}
