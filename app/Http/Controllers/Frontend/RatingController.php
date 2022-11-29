<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addrating(Request $request)
    {
        $stars_rated = $request->input('produk_rating');
        $produk_id = $request->input('produk_id');
        $user_review = $request->input('user_review');

        $produk_check = Produk::where('id', $produk_id)->where('is_active', '1')->first();
        if ($produk_check) {
            $verifikasi_pembelian = Order::where('orders.user_id', Auth::id())->where('orders.status', '3')
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $produk_id)->get();

            if ($verifikasi_pembelian->count() > 0) {
                $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $produk_id)->first();
                if ($existing_rating) {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->user_review = $user_review;
                    $existing_rating->update();
                } else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $produk_id,
                        'stars_rated' => $stars_rated,
                        'user_review' => $user_review
                    ]);
                }

                return back()->with('status', 'Terima kasih telah memberikan rating');
            } else {

                return back()->with('error', 'Anda belum pernah membeli produk ini');
            }
        } else {
            return back()->with('error', 'Produk tidak ditemukan');
        }
    }
}
