<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('dashboard.product.table', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('dashboard.product.add-product', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uploadedFiles = $request->file('gambar');
        $filePaths = [];
        if ($uploadedFiles) {
            foreach ($uploadedFiles as $file) {
                $path = $file->store('public/images/product');
                $filePaths[] = $path;
            }
        }

        Produk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => json_encode($filePaths),
        ]);

        return redirect()->route('product-table')->with('success', 'Product Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('dashboard.product.edit-product', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);
        $gambar = json_decode($produk->gambar);

        // Update data produk
        $produk->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        // Cek jika ada file gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama (opsional, tergantung kebutuhan)
            if (is_array($produk->gambar)) {
                foreach ($gambar as $oldImage) {
                    Storage::delete($oldImage);
                }
            }

            // Simpan gambar baru
            $filePaths = [];
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('public/images/product');
                $filePaths[] = $path;
            }

            // Update kolom gambar dengan gambar baru
            $produk->gambar = json_encode($filePaths);
            $produk->save();
        }

        return redirect()->route('product-table')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
