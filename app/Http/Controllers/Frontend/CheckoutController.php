<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\JobPesananBaru;
use App\Jobs\JobPesananBaruToAdmin;
use App\Models\KategoriProduk;
use App\Models\Keranjang;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $produk = Keranjang::where('user_id', Auth::id())->latest()->get();
        $cart_check = Keranjang::where('user_id', Auth::id())->count();
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
        $payment = Payment::all();

        if (Auth::user()->no_hp == null) {
            return redirect()->route('setting')->with('error', 'Silahkan lengkapi data diri anda terlebih dahulu');
        } else {
            if ($cart_check > 0) {
                return view('frontend.checkout.index', compact('produk', 'kategoriproduk_nav', 'payment'));
            } else {
                return redirect()->route('cart')->with('error', 'Keranjang masih kosong');
            }
        }
    }


    public function placeorder(Request $request)
    {
        $cart_check = Keranjang::where('user_id', Auth::id())->count();
        if ($cart_check > 0) {
            $request->validate([
                'metode' => 'required|string',
            ]);

            $order = new Order();
            $order->user_id = Auth::id();
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->no_hp = $request->input('no_hp');
            $order->alamat = $request->input('alamat');
            $order->metode = $request->input('metode');
            $order->message = $request->input('message');

            // Total Price
            $total = 0;
            $cartitems_total = Keranjang::where('user_id', Auth::id())->get();
            foreach ($cartitems_total as $prod) {
                if ($prod->produks->selling_price == null) {
                    $total += ($prod->produks->original_price * $prod->prod_qty);
                } else {
                    $total += ($prod->produks->selling_price * $prod->prod_qty);
                }
            }

            $order->total_price = $total + rand(100, 900);

            $order->tracking_no = 'PUTEKDR' . rand(111111, 999999);

            $order->save();

            $cartitems = Keranjang::where('user_id', Auth::id())->get();
            foreach ($cartitems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'prod_id' => $item->prod_id,
                    'qty' => $item->prod_qty,
                    'price' => $item->produks->selling_price == null ? $item->produks->original_price : $item->produks->selling_price,
                ]);

                $prod = Produk::where('id', $item->prod_id)->first();
                $prod->qty = $prod->qty - $item->prod_qty;
                $prod->update();
            }

            // Remove Cart Items
            // $keranjang = Keranjang::where('user_id', Auth::id())->get();
            // Keranjang::destroy($keranjang);

            // Send Email
            $detail = Order::where('id', $order->id)->first();
            $to = $request->input('email');
            $admin = 'febriye12@gmail.com';
            dispatch(new JobPesananBaru($detail, $to));
            dispatch(new JobPesananBaruToAdmin($detail, $admin));

            return redirect()->route('orderHistory')->with('status', 'Pesanan berhasil dibuat, silahkan cek email anda untuk melihat detail pesanan.');
        } else {

            return back()->with('error', 'Keranjang masih kosong');
        }
    }
}
