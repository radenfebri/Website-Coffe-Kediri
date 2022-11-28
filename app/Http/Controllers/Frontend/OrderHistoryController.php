<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->where('user_id', Auth::id())->paginate(1);
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();

        return view('frontend.orderHistory.index', compact('orders', 'kategoriproduk_nav'));
    }
}
