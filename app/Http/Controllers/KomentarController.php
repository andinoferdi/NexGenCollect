<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        $komentars = Komentar::with('user')->get();
        return view('dashboard.pages.komentar.index', compact('komentars'));
    }

    public function edit(Komentar $komentar)
    {
        return view('dashboard.pages.komentar.edit', compact('komentar'));
    }

    public function update(Request $request, Komentar $komentar)
    {
        $request->validate([
            'balasan_admin' => 'required|string|max:255',
        ]);

        $komentar->update([
            'balasan_admin' => $request->balasan_admin,
        ]);

        return redirect()->route('komentar.index')->with('success', 'Balasan admin dan rating berhasil diperbarui.');
    }

    // Menghapus komentar
    public function destroy(Komentar $komentar)
    {
        $komentar->delete();
        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil dihapus.');
    }
}
