<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\MultiImage;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('created_at', 'desc')->get();
        return view('backend.produk.index', compact('produks'));
    }



    public function create()
    {
        $kategoriproduk = KategoriProduk::orderBy('created_at', 'desc')->where('is_active', 1)->get();
        return view('backend.produk.create', compact('kategoriproduk'));
    }



    public function show($id)
    {
        $produks = Produk::find(decrypt($id));
        $images = MultiImage::where('prod_id', $produks->id)->get();
        $kategoriproduk = KategoriProduk::orderBy('created_at', 'desc')->where('is_active', 1)->get();

        return view('backend.produk.show', compact('produks', 'images', 'kategoriproduk'));
    }



    public function edit($id)
    {
        $produks = Produk::find(decrypt($id));
        $images = MultiImage::where('prod_id', $produks->id)->get();
        $kategoriproduk = KategoriProduk::orderBy('created_at', 'desc')->where('is_active', 1)->get();
        return view('backend.produk.edit', compact('produks', 'kategoriproduk', 'images'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:produks,name|min:3|max:50',
            'small_description' => 'required|min:3|max:3000',
            'description' => 'required|min:3|max:100000',
            'cover' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required',
            'original_price' => 'required',
            'qty' => 'required'
        ]);


        if (empty($request->file('cover'))) {
            $prod = new Produk([
                'name' => $request->name,
                'kategori_id' => $request->kategori_id,
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active  == TRUE ? '1' : '0',
                'popular' => $request->popular  == TRUE ? '1' : '0',
            ]);
            $prod->save();

            if ($request->hasFile('multi_image')) {
                $files = $request->file('multi_image');
                foreach ($files as $file) {
                    $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $file->getClientOriginalName();
                    $request['prod_id'] = $prod->id;
                    $request['image'] = $imageName;
                    $file->storeAs('images-produk', $imageName);
                    MultiImage::create($request->all());
                }
            }

            // toast('Kategori Produk Berhasil Ditambahkan', 'success');
            return redirect()->route('produk.index');
        } else {
            $coverName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('cover')->getClientOriginalName();
            $cover = $request->file('cover')->storeAs('cover-produk', $coverName);
            $prod = new Produk([
                'name' => $request->name,
                'kategori_id' => $request->kategori_id,
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active  == TRUE ? '1' : '0',
                'popular' => $request->popular  == TRUE ? '1' : '0',
                'cover' => $cover,
            ]);
            $prod->save();

            if ($request->hasFile('multi_image')) {
                $files = $request->file('multi_image');
                foreach ($files as $file) {
                    $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $file->getClientOriginalName();
                    $request['prod_id'] = $prod->id;
                    $request['image'] = $imageName;
                    $file->storeAs('images-produk', $imageName);
                    MultiImage::create($request->all());
                }
            }

            // toast('Kategori Produk Berhasil Ditambahkan', 'success');
            return redirect()->route('produk.index');
        }
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|unique:produks,name,' . $id,
            'small_description' => 'required|min:3|max:5000',
            'description' => 'required',
            'cover' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required',
            'original_price' => 'required',
            'qty' => 'required'
        ]);


        if (empty($request->file('cover'))) {
            $prod = Produk::findOrFail($id);
            $prod->update([
                'name' => $request->name,
                'kategori_id' => $request->kategori_id,
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active  == TRUE ? '1' : '0',
                'popular' => $request->popular  == TRUE ? '1' : '0',
            ]);


            if ($request->hasFile('multi_image')) {
                $files = $request->file('multi_image');
                foreach ($files as $file) {
                    $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $file->getClientOriginalName();
                    $request['prod_id'] = $prod->id;
                    $request['image'] = $imageName;
                    $file->storeAs('images-produk', $imageName);
                    MultiImage::create($request->all());
                }
            }

            // toast('Kategori Produk Berhasil Ditambahkan', 'success');
            return redirect()->route('produk.index');
        } else {
            $prod = Produk::findOrFail($id);
            $coverName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('cover')->getClientOriginalName();
            $cover = $request->file('cover')->storeAs('cover-produk', $coverName);
            Storage::delete($prod->cover);
            $prod->update([
                'name' => $request->name,
                'kategori_id' => $request->kategori_id,
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->name),
                'is_active' => $request->is_active  == TRUE ? '1' : '0',
                'popular' => $request->popular  == TRUE ? '1' : '0',
                'cover' => $cover,
            ]);

            if ($request->hasFile('multi_image')) {
                $files = $request->file('multi_image');
                foreach ($files as $file) {
                    $imageName = date(now()->format('d-m-Y-H-i-s')) . '_' . $file->getClientOriginalName();
                    $request['prod_id'] = $prod->id;
                    $request['image'] = $imageName;
                    $file->storeAs('images-produk', $imageName);
                    MultiImage::create($request->all());
                }
            }

            // toast('Kategori Produk Berhasil Ditambahkan', 'success');
            return redirect()->route('produk.index');
        }
    }


    public function destroy($id)
    {
        $prod = Produk::findOrFail(decrypt($id));
        Storage::delete($prod->cover);

        $images = MultiImage::where('prod_id', $prod->id)->get();
        foreach ($images as $item) {
            Storage::delete("images-produk/{$item->image}");
        }
        $prod->delete();

        // toast('Produk Berhasil Dihapus', 'success');
        return redirect()->route('produk.index');
    }


    public function deleteimage($id)
    {
        $images = MultiImage::find(decrypt($id));
        Storage::delete("images-produk/{$images->image}");
        $images->delete();

        // toast('Image Produk Berhasil Dihapus', 'success');
        return back();
    }
}
