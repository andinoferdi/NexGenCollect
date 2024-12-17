<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Nft;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\PenawaranLelang;
use App\Models\ApplicationSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class UserpageController extends Controller
{
    public function index(Request $request)
    {
        $teams = ApplicationSetting::all();
        $kategoris = Kategori::all();
        $nfts = Nft::with('kategori')->get();
        $users = User::whereHas('nfts')->with('nfts')->get(); 
        $komentars = Komentar::with('user')->get();
        return view('userpage.index', compact('teams', 'nfts', 'kategoris', 'komentars',  'users'));
    }

    public function indexnft(Request $request)
    {
        $kategoris = Kategori::all();
        $nfts = Nft::with('kategori')->get();
        
        return view('userpage.nft', compact('nfts', 'kategoris'));
    }

    public function nftDetail($id)
    {
        $nft = Nft::with('kategori')->findOrFail($id);
        $lelang = $nft->lelang()->first(); 
        $highestBid = null;
        if ($lelang) {
            $highestBid = PenawaranLelang::where('lelang_id', $lelang->id)->max('harga');
        }
    
        return view('userpage.nft_detail', compact('nft', 'lelang', 'highestBid'));
    }
    

    public function accountSettinguser(Request $request)
    {
        return view('userpage.pages.account.setting', [
            'user' => Auth::user(),
        ]);
    }

    public function updateprofileuser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoPath = $user->foto;

        if ($request->has('avatar_remove') && $request->avatar_remove == "1") {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $fotoPath = null;
        } elseif ($request->file('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $fotoPath = $request->file('foto')->store('fotos', 'public');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $fotoPath,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()->route('userpage.account_setting_user')->with('success', 'Profile updated successfully.');
    }

    public function storeKomentar(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Komentar::create([
            'komentar' => $request->komentar,
            'rating' => $request->rating,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('userpage')->with('success', 'Komentar berhasil ditambahkan.');
    }
    public function deleteKomentar($id)
{
    $komentar = Komentar::findOrFail($id);

    if ($komentar->user_id !== Auth::id()) {
        return redirect()->route('userpage')->with('error', 'Anda tidak dapat menghapus komentar ini.');
    }

    $komentar->delete();

    return redirect()->route('userpage')->with('success', 'Komentar berhasil dihapus.');
}

    
    

}
