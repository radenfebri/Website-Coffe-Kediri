<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\JobUpdatePesanan;
use App\Models\Order;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        $orders = Order::where('status', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.pesanan.index', compact('orders'));
    }


    public function packing()
    {
        $orders = Order::where('status', '1')->orderBy('created_at', 'desc')->get();
        return view('backend.pesanan.success', compact('orders'));
    }


    public function kirim()
    {
        $orders = Order::where('status', '2')->orderBy('created_at', 'desc')->get();
        return view('backend.pesanan.success', compact('orders'));
    }


    public function success()
    {
        $orders = Order::where('status', '3')->orderBy('created_at', 'desc')->get();
        return view('backend.pesanan.success', compact('orders'));
    }


    public function edit($id)
    {
        $order = Order::findOrFail(decrypt($id));
        return view('backend.pesanan.edit', compact('order'));
    }


    public function update(Request $request, $id)
    {
        $order = Order::findOrFail(decrypt($id));
        $order->update($request->all());

        // dd($order);
        $to = $order->email;
        dispatch(new JobUpdatePesanan($order, $to));

        toast('Pesanan berhasil diupdate', 'success');
        return redirect()->route('pesanan.index');
    }


    public function pesanancount()
    {
        $orders = Order::where('status', '0')->count();
        return response()->json(['count' => $orders]);
        return view('backend.layouts.sidebar', compact('orders'));
    }
}
