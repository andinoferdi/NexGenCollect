<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Nft;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    public function index()
    {
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

    public function edit(Lelang $lelang)
    {
        $nfts = Nft::all();
        return view('dashboard.pages.lelang.edit', compact('lelang', 'nfts'));
    }

    public function update(Request $request, Lelang $lelang)
    {
        $request->validate([
            'nft_id' => 'required|exists:nfts,id',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_awal',
            'status' => 'required|in:open,closed',
        ]);

        $lelang->update([
            'nft_id' => $request->nft_id,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'status' => $request->status,
        ]);

        return redirect()->route('lelang.index')->with('success', 'Lelang updated successfully.');
    }

    public function stop(Lelang $lelang)
    {
        if (now() < $lelang->tanggal_awal) {
            return redirect()->route('lelang.index')->with('error', 'Auction cannot be stopped before it starts.');
        }
    
        $lelang->update(['status' => 'closed']);
        return redirect()->route('lelang.index')->with('success', 'Auction has been stopped successfully.');
    }
    

    public function destroy(Lelang $lelang)
    {
        $lelang->nft->update(['status' => 'available']);
        $lelang->delete();

        return redirect()->route('lelang.index')->with('success', 'Lelang deleted successfully, NFT status reverted to available.');
    }
}
