<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($slug)
    {
        if (KategoriProduk::where('slug', $slug)->where('is_active', 1)->exists()) {
            $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
            $kategoriproduk = KategoriProduk::where('slug', $slug)->first();
            $produks = Produk::where('kategori_id', $kategoriproduk->id)->where('is_active', 1)->latest()->paginate(12);

            return view('frontend.kategori.index', compact('kategoriproduk_nav', 'produks'));
        } else {
            return redirect()->route('shop')->with('error', 'Kategori tidak ditemukan / sudah tidak aktif');
        }
    }
}
