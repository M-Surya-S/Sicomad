<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function about_us()
    {
        return view('home.about');
    }

    public function contacts()
    {
        return view('home.contact');
    }
}
