<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationSettingController extends Controller
{
    
    public function index()
    {
        $settings = ApplicationSetting::all();
        return view('dashboard.application_settings', compact('settings'));
    }

   public function updateAll(Request $request)
{
    $request->validate([
        'teams.*.nama_tim' => 'required|string|max:255',
        'teams.*.deskripsi_tim' => 'nullable|string|max:500',
        'teams.*.foto_tim' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    foreach ($request->teams as $id => $data) {
        $team = ApplicationSetting::findOrFail($id);

        $updateData = [
            'nama_tim' => $data['nama_tim'],
            'deskripsi_tim' => $data['deskripsi_tim'] ?? null,
        ];

        if (isset($data['foto_tim'])) {
            if ($team->foto_tim) {
                Storage::disk('public')->delete($team->foto_tim);
            }
            $updateData['foto_tim'] = $data['foto_tim']->store('team_photos', 'public');
        }

        $team->update($updateData);
    }

    return redirect()->route('application_settings')->with('success', 'Semua data tim berhasil diperbarui.');
}

}
