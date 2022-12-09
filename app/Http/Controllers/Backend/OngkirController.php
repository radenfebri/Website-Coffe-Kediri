<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ongkir;
use Illuminate\Http\Request;

class OngkirController extends Controller
{
    public function index()
    {
        $ongkir = Ongkir::latest()->get();

        return view('backend.ongkos-kirim.index', compact('ongkir'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|unique:ongkirs|min:2',
            'harga' => 'required'
        ]);

        Ongkir::create([
            'kecamatan' => $request->kecamatan,
            'harga' => $request->harga,
        ]);

        toast('Kecamamatan berhasil ditambahkan', 'success');
        return back();
    }


    public function edit($id)
    {
        $ongkir = Ongkir::findOrFail(decrypt($id));

        return view('backend.ongkos-kirim.edit', compact('ongkir'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'kecamatan' => 'required|min:2|unique:ongkirs,kecamatan,' . $id,
            'harga' => 'required'
        ]);

        $ongkir = Ongkir::findOrFail($id);
        $ongkir->update($request->all());

        toast('Kecamamatan berhasil diupdate', 'success');
        return redirect()->route('ongkir.index');
    }


    public function destroy($id)
    {
        $ongkir = Ongkir::findOrFail(decrypt($id));
        $ongkir->delete();

        toast('Kecamamatan berhasil dihapus', 'success');
        return back();
    }
}
