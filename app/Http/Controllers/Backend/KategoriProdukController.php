<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        $kategoriproduk = KategoriProduk::orderBy('created_at', 'desc')->get();
        return view('backend.kategori-produk.index', compact('kategoriproduk'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategori_produks,name|min:3|max:50',
            'description' => 'required|min:3|max:500',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if (empty($request->file('image'))) {
            KategoriProduk::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active  == TRUE ? '1' : '0',
                'popular' => $request->popular  == TRUE ? '1' : '0',
            ]);

            toast('Kategori Produk Berhasil Ditambahkan', 'success');
            return back();
        } else {
            $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('kategori-produk', $imageName);
            KategoriProduk::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active  == TRUE ? '1' : '0',
                'popular' => $request->popular  == TRUE ? '1' : '0',
                'image' => $image,
            ]);

            toast('Kategori Produk Berhasil Ditambahkan', 'success');
            return back();
        }
    }


    public function edit($id)
    {
        $kategoriproduk = KategoriProduk::findOrFail(decrypt($id));
        return view('backend.kategori-produk.edit', compact('kategoriproduk'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|unique:kategori_produks,name,' . $id,
            'description' => 'required|min:3|max:500',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if (empty($request->file('image'))) {
            $kategoriproduk = KategoriProduk::findOrFail($id);
            $kategoriproduk->update([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active  == TRUE ? '1' : '0',
                'popular' => $request->popular  == TRUE ? '1' : '0',
            ]);

            toast('Kategori Produk Berhasil Diupdate', 'success');
            return redirect()->route('kategori-produk.index');
        } else {
            $kategoriproduk = KategoriProduk::findOrFail($id);
            $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('kategori-produk', $imageName);
            Storage::delete($kategoriproduk->image);
            $kategoriproduk->update([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active  == TRUE ? '1' : '0',
                'popular' => $request->popular  == TRUE ? '1' : '0',
                'image' => $image,
            ]);

            toast('Kategori Produk Berhasil Diupdate', 'success');
            return redirect()->route('kategori-produk.index');
        }
    }


    public function destroy($id)
    {
        $kategoriproduk = KategoriProduk::find(decrypt($id));
        Storage::delete($kategoriproduk->image);
        $kategoriproduk->delete();

        toast('Kategori Produk Berhasil Dihapus', 'success');
        return back();
    }
}
