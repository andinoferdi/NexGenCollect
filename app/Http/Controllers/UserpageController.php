<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Nft;
use App\Models\Kategori;
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
        
        return view('userpage.index', compact('teams', 'nfts', 'kategoris',  'users'));
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
        $lelang = $nft->lelang()->where('status', 'open')->first();
        return view('userpage.nft_detail', compact('nft', 'lelang'));
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
}
