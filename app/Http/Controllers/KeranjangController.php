<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

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
}
