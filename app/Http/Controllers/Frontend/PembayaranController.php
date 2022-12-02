<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PromosiNavbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index($id)
    {
        if (Order::where('id', decrypt($id))->where('user_id', Auth::id())->exists()) {
            $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
            $orders = Order::where('id', decrypt($id))->where('user_id', Auth::id())->first();
            $metode = Payment::where('nama_bank', $orders->metode)->first();
            $promosi_navbar = PromosiNavbar::where('status', 1)->get();


            // dd($metode);
            
            // BELUM BAYAR
            if ($orders->status == 0) {
                return view('frontend.pembayaran.index', compact('orders', 'kategoriproduk_nav', 'metode', 'promosi_navbar'));
            } else {
                return redirect()->route('orderHistory');
            }
            // toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }
    
    
    public function packing($id)
    {
        if (Order::where('id', decrypt($id))->where('user_id', Auth::id())->exists()) {
            $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
            $orders = Order::where('id', decrypt($id))->where('user_id', Auth::id())->first();
            // $metode = Payment::where('kategori', $orders->metode)->first();
            
            // BELUM BAYAR
            if ($orders->status == 1) {
                return view('frontend.pembayaran.packing', compact('orders', 'kategoriproduk_nav'));
            } else {
                return redirect()->route('orderHistory');
            }
            // toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }
    
    
    public function kirim($id)
    {
        if (Order::where('id', decrypt($id))->where('user_id', Auth::id())->exists()) {
            $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
            $orders = Order::where('id', decrypt($id))->where('user_id', Auth::id())->first();
            // $metode = Payment::where('kategori', $orders->metode)->first();
            
            // BELUM BAYAR
            if ($orders->status == 2) {
                return view('frontend.pembayaran.kirim', compact('orders', 'kategoriproduk_nav'));
            } else {
                return redirect()->route('orderHistory');
            }
            // toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }
    
    
    public function selesai($id)
    {
        if (Order::where('id', decrypt($id))->where('user_id', Auth::id())->exists()) {
            $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
            $orders = Order::where('id', decrypt($id))->where('user_id', Auth::id())->first();
            // $metode = Payment::where('kategori', $orders->metode)->first();
            
            // BELUM BAYAR
            if ($orders->status == 3) {
                return view('frontend.pembayaran.selesai', compact('orders', 'kategoriproduk_nav'));
            } else {
                return redirect()->route('orderHistory');
            }
            // toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }
}
