<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class UserpageController extends Controller
{
       public function index(Request $request)
{
    return view('userpage.index');
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

    return redirect()->route('account_setting_user')->with('success', 'Profile updated successfully.');
}

}
