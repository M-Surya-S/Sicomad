<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function catalog()
    {
        $produk = Produk::paginate(12);
        $kategori = Kategori::with('produk')->get();
        return view('home.shop', compact('produk', 'kategori'));
    }

    public function about_us()
    {
        return view('home.about');
    }
}
