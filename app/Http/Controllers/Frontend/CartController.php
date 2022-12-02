<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\PromosiNavbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $produk = Keranjang::where('user_id', Auth::id())->get();
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $promosi_navbar = PromosiNavbar::where('status', 1)->get();

        return view('frontend.cart.index', compact('produk', 'kategoriproduk_nav', 'promosi_navbar'));
    }


    public function addProduk(Request $request)
    {
        $produk_id = $request->input('produk_id');
        $produk_qty = $request->input('produk_qty');
        $produk_check = Produk::where('id', $produk_id)->first();

        if (Produk::where('is_active', 1)->where('id', $produk_id)->exists()) {
            if ($produk_check) {
                if (Keranjang::where('prod_id', $produk_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => 'info', 'message' => "Produk $produk_check->name sudah ada di keranjang"]);
                } else {
                    if (Auth::check()) {
                        if (Produk::find($produk_id)) {
                            $keranjang = new Keranjang();
                            $keranjang->prod_id = $produk_id;
                            $keranjang->prod_qty = $produk_qty;
                            $keranjang->user_id = Auth::id();
                            $keranjang->save();

                            return response()->json(['status' => 'success', 'message' => "Produk berhasil ditambahkan ke keranjang"]);
                        } else {
                            return response()->json(['status' => 'error', 'message' => "Produk tidak ditemukan"]);
                        }
                    } else {
                        return response()->json(['status' => 'warning', 'message' => "Anda belum login"]);
                    }
                }
            }
        } else {
            return response()->json(['status' => 'error', 'message' => "Produk tidak ditemukan / sudah tidak aktif"]);
        }
    }


    public function cartcount()
    {
        $cartcount = Keranjang::where('user_id', Auth::id())->count();

        return response()->json(['count' => $cartcount]);
    }


    public function deleteproduk(Request $request)
    {

        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Keranjang::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $keranjang = Keranjang::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $keranjang->delete();

                return response()->json(['status' => 'success', 'message' => "Produk berhasil dihapus dari keranjang"]);
            }
        } else {
            return response()->json(['status' => 'success', 'message' => "Login terlebih dahulu"]);
        }
    }


    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $produk_qty = $request->input('prod_qty');

        if(Auth::check())
        {
            if(Keranjang::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $keranjang = Keranjang::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $keranjang->prod_qty = $produk_qty;
                $keranjang->update();
                return response()->json(['status' => "Quantity Update"]);
                // return back();
            }
        }
    }
}
