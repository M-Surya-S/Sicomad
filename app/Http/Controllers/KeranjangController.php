<?php

namespace App\Http\Controllers;

use App\Models\ItemKeranjang;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  KeranjangController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cari atau buat keranjang baru jika belum ada
        $keranjang = Keranjang::firstOrCreate(['user_id' => $user->id]);

        $item_keranjang = ItemKeranjang::where('keranjang_id', $keranjang->id)->get();
        $total_harga = $item_keranjang->sum('total');
        return view('home.cart', compact('item_keranjang', 'total_harga'));
    }

    public function addToCart($idProduk)
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->first();

        // Ambil produk yang akan ditambahkan
        $produk = Produk::findOrFail($idProduk);

        // Cek apakah item sudah ada di keranjang
        $item_keranjang = ItemKeranjang::where('keranjang_id', $keranjang->id)
            ->where('produk_id', $produk->id)
            ->first();

        if ($item_keranjang) {
            // Jika item sudah ada, perbarui quantity
            $item_keranjang->quantity += 1;
            $item_keranjang->total = $item_keranjang->harga * $item_keranjang->quantity;
            $item_keranjang->save();
        } else {
            // Jika item belum ada, buat item baru di cart_items
            $harga = $this->convertCurrency($produk->harga);

            ItemKeranjang::create([
                'keranjang_id' => $keranjang->id,
                'produk_id' => $produk->id,
                'quantity' => 1,
                'harga' => $harga,
                'total' => $harga * 1,
            ]);
        }

        return redirect()->route('catalog')->with('success', 'Product Successfully Added to Your Cart');
    }

    private function convertCurrency($value)
    {
        // Menghapus prefix 'Rp ' dan tanda titik
        $value = str_replace(['Rp ', '.'], '', $value);

        // Mengonversi string ke integer
        return intval($value);
    }

    public function updateCart(Request $request)
    {
        // Delete item dari keranjang
        if ($request->has('destroy')) {
            $itemId = $request->input('destroy');
            ItemKeranjang::where('id', $itemId)->delete();

            return redirect()->route('cart')->with('success', 'Item Successfully Deleted from Your Cart');
        }

        // Update quantities dan total
        if ($request->has('quantities')) {
            $quantities = $request->input('quantities');
            foreach ($quantities as $itemId => $quantity) {
                $item = ItemKeranjang::find($itemId);
                if ($item) {
                    $hargaProduk = $item->harga;
                    $totalBaru = $hargaProduk * $quantity;

                    // Update quantity dan total
                    $item->update([
                        'quantity' => $quantity,
                        'total' => $totalBaru,
                    ]);
                }
            }
        }

        return redirect()->route('checkout');
    }
}
