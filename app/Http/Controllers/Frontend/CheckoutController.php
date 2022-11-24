<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $produk = Keranjang::where('user_id', Auth::id())->get();
        $cart_check = Keranjang::where('user_id', Auth::id())->count();
        // $payment = Payment::all();
        
        if (Auth::user()->no_hp == null) {
            return redirect()->route('setting')->with('error', 'Silahkan lengkapi data diri anda terlebih dahulu');
        } else {
            if ($cart_check > 0) {
                return view('frontend.checkout.index', compact('produk', 'payment'));
            } else {
                return redirect()->route('cart')->with('error', 'Keranjang masih kosong');
            }
        }
    }
    
    
    // public function placeorder(Request $request)
    // {
    //     $cart_check = Keranjang::where('user_id', Auth::id())->count();
    //     if ($cart_check > 0) {
    //         $request->validate([
    //             'metode' => 'required|string',
    //             'message' => 'required|string|max:500',
    //         ]);
            
    //         $order = new Order();
    //         $order->user_id = Auth::id();
    //         $order->name = $request->input('name');
    //         $order->email = $request->input('email');
    //         $order->no_hp = $request->input('no_hp');
    //         $order->metode = $request->input('metode');
    //         $order->message = $request->input('message');
            
    //         // Total Price
    //         $total = 0;
    //         $cartitems_total = Keranjang::where('user_id', Auth::id())->get();
    //         foreach ($cartitems_total as $prod) {
    //             if ($prod->produks->selling_price == null) {
    //                 $total += $prod->produks->original_price;
    //             } else {
    //                 $total += $prod->produks->selling_price;
    //             }
    //         }
            
    //         $order->total_price = $total + rand(11, 55);
            
    //         $order->tracking_no = 'RFS' . rand(111111, 999999);
            
    //         $order->save();
            
            
    //         $cartitems = Keranjang::where('user_id', Auth::id())->get();
    //         foreach ($cartitems as $item) {
    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'prod_id' => $item->prod_id,
    //                 'price' => $item->produks->selling_price == null ? $item->produks->original_price : $item->produks->selling_price,
    //             ]);
                
    //             $prod = Produk::where('id', $item->prod_id)->first();
    //             $prod->update();
    //         }
            
    //         // Remove Cart Items
    //         $keranjang = Keranjang::where('user_id', Auth::id())->get();
    //         Keranjang::destroy($keranjang);
            
    //         // Send Email
    //         $detail = Order::where('id', $order->id)->first();
    //         $to = $request->input('email');
    //         $admin = 'febriye12@gmail.com';
    //         dispatch(new JobPesananBaru($detail, $to));
    //         dispatch(new JobPesananBaruToAdmin($detail, $admin));
            
            
    //         return redirect()->route('myorder.index')->with('status', 'Pesanan berhasil dibuat, silahkan cek email anda untuk melihat detail pesanan.');
    //     } else {
            
    //         return back()->with('error', 'Keranjang masih kosong');
    //     }
    // }
    
    
    // public function myorder()
    // {
    //     $orders = Order::orderBy('created_at', 'desc')->where('user_id', Auth::id())->paginate(10);
    //     return view('frontend.order.myorder', compact('orders'));
    // }
    
    
    // public function orderbayar($id)
    // {
    //     if (Order::where('id', decrypt($id))->where('user_id', Auth::id())->exists()) {
    //         $orders = Order::where('id', decrypt($id))->where('user_id', Auth::id())->first();
    //         $payment = Payment::all();
    //         $metode = Payment::where('kategori', $orders->metode)->first();
            
    //         // dd($orders->metode);
    //         // dd($metode);
            
    //         if ($orders->status == 0) {
    //             return view('frontend.order.view', compact('orders', 'metode', 'payment'));
    //         } else {
    //             return redirect()->route('myorder.index');
    //         }
    //     } else {
            
    //         // toast('Link Tidak dapat Ditemukan','error');
    //         return back();
    //     }
    // }
    
    
    // public function historyorder($id)
    // {
    //     if (Order::where('id', decrypt($id))->where('user_id', Auth::id())->exists()) {
    //         $orders = Order::where('id', decrypt($id))->where('user_id', Auth::id())->first();
            
    //         if ($orders->status == 1) {
    //             return view('frontend.order.history-order', compact('orders'));
    //         } else {
    //             return redirect()->route('myorder.index');
    //         }
    //     } else {
            
    //         // toast('Link Tidak dapat Ditemukan','error');
    //         return redirect()->route('myorder.index');
    //     }
    // }
    
    
    // public function ordercount()
    // {
    //     $ordercount = Order::where('user_id', Auth::id())->count();
        
    //     return response()->json(['count' => $ordercount]);
    // }
    
}
