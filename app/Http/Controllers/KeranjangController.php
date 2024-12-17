<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::with('nft')->where('user_id', Auth::id())->get();

        $totalHarga = $keranjangs->sum(function($keranjang) {
            return $keranjang->nft->harga_akhir ?? 0;
        });

        return view('userpage.keranjang', compact('keranjangs', 'totalHarga'));
    }

    public function checkout(Request $request)
    {
        $keranjangs = Keranjang::with('nft')->where('user_id', Auth::id())->get();

        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang Anda kosong.');
        }

        $totalHarga = $keranjangs->sum(function ($keranjang) {
            return $keranjang->nft->harga_akhir ?? 0;
        });

        $checkout = Checkout::updateOrCreate(
            ['user_id' => Auth::id(), 'status' => 'pending'],
            ['total_harga' => $totalHarga, 'status' => 'pending']
        );

        return redirect()->route('checkout.index');
    }
}
