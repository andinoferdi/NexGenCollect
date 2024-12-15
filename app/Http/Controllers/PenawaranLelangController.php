<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\PenawaranLelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenawaranLelangController extends Controller
{
    public function index($lelangId)
    {
        $lelang = Lelang::with('nft')->findOrFail($lelangId);
        $penawaran = PenawaranLelang::where('lelang_id', $lelangId)
            ->with('user')
            ->orderBy('harga', 'desc')
            ->get();

        return view('userpage.penawaran_lelang', compact('lelang', 'penawaran'));
    }

    public function store(Request $request, $lelangId)
    {
        $request->validate([
            'harga' => 'required|numeric|min:1',
        ]);

        $lelang = Lelang::with('nft')->findOrFail($lelangId);

        if ($lelang->status === 'closed') {
            return redirect()->back()->with('error', 'Lelang telah selesai.');
        }

        $hargaAwal = $lelang->nft->harga_awal;
        $highestBid = PenawaranLelang::where('lelang_id', $lelangId)->max('harga');
        $minBid = $highestBid ? $highestBid + 1 : $hargaAwal;

        if ($request->harga < $minBid) {
            return redirect()->back()->with('error', "Penawaran harus lebih besar dari Rp " . number_format($minBid, 0, ',', '.'));
        }

        $penawaran = PenawaranLelang::where('user_id', auth()->id())
            ->where('lelang_id', $lelangId)
            ->first();

        if ($penawaran) {
            $penawaran->update(['harga' => $request->harga]);
        } else {
            PenawaranLelang::create([
                'user_id' => auth()->id(),
                'lelang_id' => $lelangId,
                'harga' => $request->harga,
            ]);
        }

        return redirect()->back()->with('success', 'Penawaran berhasil diperbarui.');
    }

    public function highestBid($lelangId)
    {
        $highestBid = PenawaranLelang::where('lelang_id', $lelangId)
            ->orderBy('harga', 'desc')
            ->first();

        return response()->json($highestBid);
    }

    public function destroy($id)
    {
        $penawaran = PenawaranLelang::findOrFail($id);

        if ($penawaran->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki hak untuk menghapus penawaran ini.');
        }

        $penawaran->delete();

        return redirect()->back()->with('success', 'Penawaran berhasil dihapus.');
    }
}
