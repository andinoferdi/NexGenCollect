<?php

namespace App\Http\Controllers;

use App\Http\Requests\NftRequest;
use App\Http\Requests\NftRequestStore;
use App\Http\Requests\NftRequestUpdate;
use App\Models\Nft;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NftController extends Controller
{
    public function index()
    {
        $nfts = Nft::with('kategori', 'user')->get();
        return view('dashboard.pages.nft.index', compact('nfts'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $users = User::all();
        return view('dashboard.pages.nft.create', compact('kategoris', 'users'));
    }

    public function store(NftRequestStore $request)
{
    $request->validated();

    $file = $request->file('file');
    $fileName = $file->getClientOriginalName();
    $filePath = $file->storeAs('nft_files', $fileName, 'public');

    $foto = $request->file('foto');
    $fotoName = $foto->getClientOriginalName();
    $fotoPath = $foto->storeAs('nft_photos', $fotoName, 'public'); 

    // Menyimpan data NFT ke database
    Nft::create([
        'nama_nft' => $request->nama_nft,
        'file' => $filePath,
        'foto' => $fotoPath,
        'deskripsi' => $request->deskripsi,
        'kategori_id' => $request->kategori_id,
        'user_id' => $request->user_id,
        'harga_awal' => $request->harga_awal,
        'status' => $request->status,
    ]);

    return redirect()->route('nft.index')->with('success', 'NFT created successfully.');
}


    public function edit(Nft $nft)
    {
        $kategoris = Kategori::all();
        $users = User::all();
        return view('dashboard.pages.nft.edit', compact('nft', 'kategoris', 'users'));
    }

  public function update(NftRequestUpdate $request, Nft $nft)
{
    $request->validated();

    $data = $request->only(['nama_nft', 'deskripsi', 'kategori_id', 'user_id', 'harga_awal', 'status']);

    if ($request->hasFile('file')) {
        if ($nft->file) {
            Storage::disk('public')->delete($nft->file);
        }

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('nft_files', $fileName, 'public');
        $data['file'] = $filePath;
    }

    if ($request->hasFile('foto')) {
        if ($nft->foto) {
            Storage::disk('public')->delete($nft->foto);
        }

        $foto = $request->file('foto');
        $fotoName = time() . '_' . $foto->getClientOriginalName(); 
        $fotoPath = $foto->storeAs('nft_photos', $fotoName, 'public');
        $data['foto'] = $fotoPath;
    }

    $nft->update($data);

    return redirect()->route('nft.index')->with('success', 'NFT updated successfully.');
}


    public function show(Nft $nft)
    {
        $nft->load('kategori', 'user');
        return view('dashboard.pages.nft.detail', compact('nft'));
    }

    public function destroy(Nft $nft)
    {
        Storage::disk('public')->delete([$nft->file, $nft->foto]);
        $nft->delete();

        return redirect()->route('nft.index')->with('success', 'NFT deleted successfully.');
    }
}
