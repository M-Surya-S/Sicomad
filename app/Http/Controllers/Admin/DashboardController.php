<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $new_order = Pesanan::where('status', 'Diproses')->count();
        $pesanan = Pesanan::all()->count();
        $produk = Produk::all()->count();
        $kategori = Kategori::all()->count();
        return view('dashboard.index', compact('new_order', 'pesanan', 'produk', 'kategori'));
    }
}
