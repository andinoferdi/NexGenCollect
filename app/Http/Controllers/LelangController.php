<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Lelang;
use App\Models\Nft;
use App\Models\PenawaranLelang;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    public function index()
    {
        $expiredLelangs = Lelang::where('status', 'open')
            ->where('tanggal_akhir', '<=', now())
            ->get();

        foreach ($expiredLelangs as $lelang) {
            $highestBid = PenawaranLelang::where('lelang_id', $lelang->id)->max('harga');

            if (!$highestBid) {
                $lelang->nft->update([
                    'status' => 'available',
                    'harga_akhir' => null,
                ]);
            } else {
                $highestBidder = PenawaranLelang::where('lelang_id', $lelang->id)
                    ->where('harga', $highestBid)
                    ->first();

                $lelang->nft->update([
                    'status' => 'sold',
                    'harga_akhir' => $highestBid,
                ]);

                Keranjang::create([
                    'user_id' => $highestBidder->user_id,
                    'nft_id' => $lelang->nft_id,
                ]);
            }

            $lelang->update([
                'status' => 'closed',
                'harga_akhir' => $highestBid ?? null,
            ]);
        }

        $lelangs = Lelang::with('nft')->get();
        return view('dashboard.pages.lelang.index', compact('lelangs'));
    }


    public function create()
    {
        $nfts = Nft::where('status', 'available')->get();
        return view('dashboard.pages.lelang.create', compact('nfts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nft_id' => 'required|exists:nfts,id',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_awal',
        ]);

        $nft = Nft::where('id', $request->nft_id)
            ->where(function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhere('user_id', 1);
            })
            ->where('status', 'available')
            ->first();

        if (!$nft) {
            return redirect()->back()->with('error', 'You cannot auction this NFT.');
        }

        Lelang::create([
            'nft_id' => $request->nft_id,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'status' => 'open',
        ]);

        $nft->update(['status' => 'auction']);

        return redirect()->route('lelang.index')->with('success', 'Auction created successfully.');
    }

    public function stop(Lelang $lelang)
    {
        if (now() < $lelang->tanggal_awal) {
            return redirect()->route('lelang.index')->with('error', 'Auction cannot be stopped before it starts.');
        }

        $highestBid = PenawaranLelang::where('lelang_id', $lelang->id)->max('harga');

        if (!$highestBid) {
            $lelang->nft->update([
                'status' => 'available',
                'harga_akhir' => null,
            ]);
            return redirect()->route('lelang.index')->with('success', 'Auction closed with no bids. NFT status is available.');
        }

        $highestBidder = PenawaranLelang::where('lelang_id', $lelang->id)
            ->where('harga', $highestBid)
            ->first();

        $lelang->nft->update([
            'status' => 'sold',
            'harga_akhir' => $highestBid,
        ]);

        Keranjang::create([
            'user_id' => $highestBidder->user_id,
            'nft_id' => $lelang->nft_id,
        ]);

        $lelang->update([
            'status' => 'closed',
            'harga_akhir' => $highestBid,
        ]);

        return redirect()->route('lelang.index')->with('success', 'Auction stopped successfully. NFT status is now sold.');
    }


    public function destroy(Lelang $lelang)
    {
        $lelang->nft->update(['status' => 'available']);
        $lelang->delete();

        return redirect()->route('lelang.index')->with('success', 'Lelang deleted successfully, NFT status reverted to available.');
    }
}
