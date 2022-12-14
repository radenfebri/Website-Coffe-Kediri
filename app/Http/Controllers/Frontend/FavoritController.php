<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Favorit;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\PromosiNavbar;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{    
    public function favoritview()
    {
        $favorit = Favorit::where('user_id', Auth::id())->latest()->paginate(10);
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $promosi_navbar = PromosiNavbar::where('status', 1)->get();
        $setting_website = SettingWebsite::first();
        
        return view('frontend.favorit.index', compact('favorit', 'setting_website','kategoriproduk_nav', 'promosi_navbar'));
    }
    
    
    
    public function addFavorit(Request $request)
    {
        $produk_id = $request->input('produk_id');
        $produk_check = Produk::where('id', $produk_id)->first();
        
        if ($produk_check) {
            if (Favorit::where('prod_id', $produk_id)->where('user_id', Auth::id())->exists()) {
                return response()->json(['status' => 'info', 'message' => "Produk $produk_check->name sudah ada di favorit"]);
            } else {
                if (Auth::check()) {
                    if (Produk::find($produk_id)) {
                        $favorit = new Favorit();
                        $favorit->prod_id = $produk_id;
                        $favorit->user_id = Auth::id();
                        $favorit->save();
                        
                        return response()->json(['status' => 'success', 'message' => "Produk berhasil ditambahkan ke favorit"]);
                    } else {
                        return response()->json(['status' => 'error', 'message' => "Produk tidak ditemukan"]);
                    }
                } else {
                    return response()->json(['status' => 'warning', 'message' => "Anda belum login"]);
                }
            }
        }
    }
    
    public function favoritcount()
    {
        $cartcount = Favorit::where('user_id', Auth::id())->count();
        
        return response()->json(['count' => $cartcount]);
    }
    
    
    public function deleteproduk(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Favorit::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $keranjang = Favorit::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $keranjang->delete();
                
                return response()->json(['status' => 'success', 'message' => "Produk berhasil dihapus dari favorit"]);
            }
        } else {
            return back();
            return response()->json(['status' => 'success', 'message' => "Login terlebih dahulu"]);
        }
    }
}
