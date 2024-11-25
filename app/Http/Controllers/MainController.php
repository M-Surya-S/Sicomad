<?php

namespace App\Http\Controllers;

use App\Models\ItemPesanan;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class MainController extends Controller
{
    public function index()
    {
        $new_arrivals = Produk::limit(8)->get();
        return view('home.index', compact('new_arrivals'));
    }

    public function catalog(Request $request)
    {
        // Ambil ID kategori dan parameter pencarian dari request
        $kategoriId = $request->input('kategori');
        $search = $request->input('search');

        // Ambil kategori untuk sidebar dengan menghitung jumlah produk per kategori
        $kategori = Kategori::withCount('produk')->get();

        // Query produk berdasarkan kategori dan/atau pencarian
        $produk = Produk::when($kategoriId, function ($query) use ($kategoriId) {
            return $query->where('kategori_id', $kategoriId);
        })
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->paginate(12)
            ->withQueryString();

        return view('home.catalog', compact('produk', 'kategori', 'kategoriId', 'search'));
    }

    public function myOrder()
    {
        // Cari pesanan berdasarkan user_id yang sedang login
        $user = Auth::user();
        $pesanan = Pesanan::where('user_id', $user->id)->get();

        // Cari semua item pesanan yang terkait dengan pesanan pengguna
        $item_pesanan = ItemPesanan::whereIn('pesanan_id', $pesanan->pluck('id'))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home.order', compact('item_pesanan'));
    }


    public function about_us()
    {
        return view('home.about');
    }

    public function contacts()
    {
        return view('home.contact');
    }
}
