<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerifikasi;
use Illuminate\Http\Request;

class UserVerifikasiController extends Controller
{
    public function indexUser()
{
    $verifikasi = UserVerifikasi::where('user_id', auth()->user()->id)->first();
    
    return view('userpage.pages.verifikasi_user', compact('verifikasi'));
}

    public function store(Request $request)
    {
        $request->validate([
            'ktp_file' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'portfolio_file' => 'required|file|mimes:jpeg,png,jpg,pdf,mp4|max:4096',
            'deskripsi' => 'required|string',
            'sosial_media_info' => 'required|string',
        ]);

        $ktpFile = $request->file('ktp_file')->store('user_verifikasi/ktp', 'public');
        $portfolioFile = $request->file('portfolio_file')->store('user_verifikasi/portfolio', 'public');

        UserVerifikasi::create([
            'user_id' => auth()->user()->id,
            'ktp_file' => $ktpFile,
            'portfolio_file' => $portfolioFile,
            'deskripsi' => $request->deskripsi,
            'sosial_media_info' => $request->sosial_media_info,
        ]);

        return redirect()->route('verifikasi.indexuser')->with('success', 'Verifikasi Anda telah dikirim dan menunggu approval.');
    }

    public function indexAdmin()
    {
        $verifications = UserVerifikasi::with('user')->get();
        $users = User::with('role')->get();

        return view('dashboard.pages.verifikasi_user.index', compact('verifications','users'));
    }

    public function show(UserVerifikasi $userVerifikasi)
    {
        return view('dashboard.pages.verifikasi_user.detail', compact('userVerifikasi'));
    }

    public function verify(UserVerifikasi $userVerifikasi)
    {
        $userVerifikasi->status_verifikasi = 'verified';
        $userVerifikasi->save();

        $userVerifikasi->user->role_id = 3; // Misalnya role 'Seniman'
        $userVerifikasi->user->save();

        return redirect()->route('verifikasi.index')->with('success', 'User telah diverifikasi dan menjadi Seniman.');
    }

    public function reject(UserVerifikasi $userVerifikasi)
    {
        // Mengubah status verifikasi menjadi 'rejected'
        $userVerifikasi->status_verifikasi = 'rejected';
        $userVerifikasi->save();

        return redirect()->route('verifikasi.index')->with('success', 'User verifikasi telah ditolak.');
    }
}
