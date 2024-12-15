<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::with(['nft'])->where('user_id', auth()->user()->id)->get();
        $total = 0;

        foreach ($keranjangs as $item) {
            $total += $item->nft->harga_akhir ?? $item->nft->harga_awal;
        }

        return view('userpage.keranjang', compact('keranjangs', 'total'));
    }

    public function store($id)
    {
        $cek = Keranjang::where('user_id', auth()->user()->id)->where('nft_id', $id)->first();

        if ($cek) {
            $cek->update([
            ]);
        } else {
            Keranjang::create([
                'nft_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect('/keranjang')->with('alert', 'Berhasil Ditambahkan Ke keranjang');
    }

    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->update([
        ]);
        
        return redirect('/keranjang');
    }

    public function massUpdate(Request $request)
    {
        foreach ($request->keranjang_id as $i => $keranjang) {
            Keranjang::find($keranjang)->update([
            ]);
        }
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
        
        return response()->json(['status' => true]);
    }
}
