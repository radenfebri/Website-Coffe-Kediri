<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\MultiImage;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $ratings = Rating::where('prod_id', $produk->id)->where('status', 1)->get();
            $rating_sum = Rating::where('prod_id', $produk->id)->sum('stars_rated');
            $user_rating = Rating::where('prod_id', $produk->id)->where('user_id', Auth::id())->first();
            $cek_user = Order::where('orders.user_id', Auth::id())->where('orders.status', '1')
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $produk->id)->get();

            if ($ratings->count() > 0) {
                $rating_avg = $rating_sum / $ratings->count();
            } else {
                $rating_avg = 0;
            }

            return view('frontend.detail-produk.index', compact(
                'produk',
                'images',
                'kategoriproduk',
                'kategori',
                'newproduk',
                'kategoriproduk_nav',
                'ratings',
                'rating_sum',
                'user_rating',
                'cek_user'
            ));
        } else {
            return redirect()->route('shop')->with('error', 'Produk tidak ditemukan / sudah tidak aktif');
        }
    }
}
