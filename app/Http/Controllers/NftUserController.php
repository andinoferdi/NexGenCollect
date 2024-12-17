<?php

namespace App\Http\Controllers;

use App\Models\NftUser;
use Illuminate\Support\Facades\Auth;

class NftUserController extends Controller
{
    public function index()
    {
        $nfts = NftUser::with('nft')
            ->where('user_id', Auth::id())
            ->get();

        return view('userpage.pages.account.nft_user', compact('nfts'));
    }
}
