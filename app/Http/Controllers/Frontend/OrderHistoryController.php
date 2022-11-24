<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->where('user_id', Auth::id())->paginate(10);

        return view('frontend.orderHistory.index', compact('orders'));
    }
}
