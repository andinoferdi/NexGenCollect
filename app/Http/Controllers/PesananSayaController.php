<?php

namespace App\Http\Controllers;

use App\Models\PesananSaya;
use Illuminate\Support\Facades\Auth;

class PesananSayaController extends Controller
{
    public function index()
    {
        $pesanans = PesananSaya::with('nft')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('userpage.pages.account.pesanan_saya', compact('pesanans'));
    }
}
