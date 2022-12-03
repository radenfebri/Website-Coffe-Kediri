<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        // abort_if(Gate::denies('dashboard'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $order_paid = Order::where('status', 3)->get();
        $order_unpaid = Order::where('status', 0)->get();

        return view('backend.dashboard', compact('order_paid', 'order_unpaid'));
    }
}
