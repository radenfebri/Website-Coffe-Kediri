<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->get();
        return view('backend.payment.index', compact('payments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'atas_nama' => 'required',
            'kategori' => 'required',
        ]);

        if (empty($request->file('image'))) {
            Payment::create([
                'atas_nama' => $request->atas_nama,
                'no_rek' => $request->no_rek,
                'kategori' => $request->kategori,
                'nama_bank' => $request->nama_bank,
            ]);

            toast('Nomor Rekening Berhasil Ditambahkan', 'success');
            return back();
        } else {
            $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('image-payment', $imageName);
            Payment::create([
                'image' => $image,
                'atas_nama' => $request->atas_nama,
                'no_rek' => $request->no_rek,
                'kategori' => $request->kategori,
                'nama_bank' => $request->nama_bank,
            ]);

            toast('Nomor Rekening Berhasil Ditambahkan', 'success');
            return back();
        }
    }



    public function edit($id)
    {
        $payment = Payment::findOrFail(decrypt($id));
        return view('backend.payment.edit', compact('payment'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'atas_nama' => 'required',
            'kategori' => 'required',
        ]);


        if (empty($request->file('image'))) {
            $payment = Payment::findOrFail($id);
            $payment->update([
                'atas_nama' => $request->atas_nama,
                'no_rek' => $request->no_rek,
                'kategori' => $request->kategori,
                'nama_bank' => $request->nama_bank,
            ]);

            toast('Nomor Rekening Berhasil Diubah', 'success');
            return redirect()->route('payment.index');
        } else {
            $payment = Payment::findOrFail($id);
            $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('image-payment', $imageName);
            Storage::delete($payment->image);
            $payment->update([
                'atas_nama' => $request->atas_nama,
                'no_rek' => $request->no_rek,
                'kategori' => $request->kategori,
                'nama_bank' => $request->nama_bank,
                'image' => $image,
            ]);
        }
        toast('Nomor Rekening Berhasil Diubah', 'success');
        return redirect()->route('payment.index');
    }



    public function destroy($id)
    {
        $payment = Payment::findOrFail(decrypt($id));
        Storage::delete($payment->image);
        $payment->delete();
        toast('Nomor Rekening Berhasil Dihapus', 'success');
        return back();
    }
}
