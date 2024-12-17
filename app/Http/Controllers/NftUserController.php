<?php

namespace App\Http\Controllers;

use App\Models\NftUser;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class NftUserController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $kategoris = Kategori::all();

    $nfts = NftUser::with('nft.kategori')
        ->where('user_id', $user->id)
        ->get()
        ->pluck('nft');

    return view('userpage.pages.account.nft_user', compact('nfts', 'kategoris'));
}

public function show($id)
{
    $nftUser = NftUser::with('nft.kategori')->findOrFail($id);
    $nft = $nftUser->nft;

    return view('userpage.pages.account.nft_user_detail', compact('nft'));
}

}
