<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemPesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('item_pesanan')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.order.table', compact('pesanan'));
    }

    public function updateStatus(Request $request, string $id)
    {
        $order = Pesanan::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function filter()
    {
        $pesanan = Pesanan::with('item_pesanan')->where('status', "Diproses")
            ->orderBy('created_at', 'desc')
            ->get();
        return view('dashboard.order.table', compact('pesanan'));
    }
}
