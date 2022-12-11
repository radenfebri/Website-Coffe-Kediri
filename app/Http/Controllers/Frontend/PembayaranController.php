<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Jobs\JobUpdatePesanan;
use App\Models\KategoriProduk;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PromosiNavbar;
use App\Models\SettingWebsite;
use App\Models\User;
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
            $setting_website = SettingWebsite::first();
            $promosi_navbar = PromosiNavbar::where('status', 1)->get();
            $user = User::where('ongkir_id', Auth::user()->ongkir_id)->get();
            foreach ($user as $data) {
                $kirim = $data->ongkir->harga;
            }

            // BELUM BAYAR
            if ($orders->status == 0) {
                return view('frontend.pembayaran.index', compact('orders', 'setting_website', 'kategoriproduk_nav', 'metode', 'promosi_navbar', 'kirim'));
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
            $metode = Payment::where('kategori', $orders->metode)->first();
            $setting_website = SettingWebsite::first();
            $promosi_navbar = PromosiNavbar::where('status', 1)->get();
            $user = User::where('ongkir_id', Auth::user()->ongkir_id)->get();
            foreach ($user as $data) {
                $kirim = $data->ongkir->harga;
            }

            // BELUM BAYAR
            if ($orders->status == 1) {
                return view('frontend.pembayaran.packing', compact('orders', 'kategoriproduk_nav', 'metode', 'setting_website', 'promosi_navbar', 'kirim'));
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
            $metode = Payment::where('kategori', $orders->metode)->first();
            $setting_website = SettingWebsite::first();
            $promosi_navbar = PromosiNavbar::where('status', 1)->get();
            $user = User::where('ongkir_id', Auth::user()->ongkir_id)->get();
            foreach ($user as $data) {
                $kirim = $data->ongkir->harga;
            }

            // BELUM BAYAR
            if ($orders->status == 2) {
                return view('frontend.pembayaran.kirim', compact('orders', 'kategoriproduk_nav', 'metode', 'setting_website', 'promosi_navbar', 'kirim'));
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
            $metode = Payment::where('kategori', $orders->metode)->first();
            $setting_website = SettingWebsite::first();
            $promosi_navbar = PromosiNavbar::where('status', 1)->get();
            $user = User::where('ongkir_id', Auth::user()->ongkir_id)->get();
            foreach ($user as $data) {
                $kirim = $data->ongkir->harga;
            }


            // BELUM BAYAR
            if ($orders->status == 3) {
                return view('frontend.pembayaran.selesai', compact('orders', 'kategoriproduk_nav', 'setting_website', 'promosi_navbar', 'metode', 'kirim'));
            } else {
                return redirect()->route('orderHistory');
            }
            // toast('Link Tidak dapat Ditemukan','error');
            return back();
        }
    }


    public function pesanan_diterima(Request $request, $id)
    {
        $pesanan_diterima = Order::findOrFail($id);
        $pesanan_diterima->update([
            'status' => $request->status,
            'message_admin' => 'Terimakasih sudah menekan tombol Pesanan Diterima, untuk selanjutnya silahkan cek terlebih dahulu barang yang sudah anda beli, apabila ada kesalahan dari kami silahkan langsung mengklik tombol Complain pada Pesanan Status Selesai.',
        ]);

        $to = $pesanan_diterima->email;
        dispatch(new JobUpdatePesanan($pesanan_diterima, $to));

        return redirect()->route('orderHistory')->with('status', 'Terimakasih telah menerima pesanan yang sudah kami kirimkan.');
    }
}
