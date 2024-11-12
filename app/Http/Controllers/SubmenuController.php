<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    public function index()
    {
        $submenus = Submenu::with('menu')->get(); // Memuat submenu dengan menu terkait
        return view('dashboard.pages.submenu.index', compact('submenus'));
    }

    public function create()
    {
        $menus = Menu::all(); // Menampilkan semua menu
        return view('dashboard.pages.submenu.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'nama_submenu' => 'required',
            'link_submenu' => 'required',
            'icon_submenu' => 'nullable',
        ]);

        Submenu::create($validated);

        return redirect()->route('submenu.index')->with('success', 'Submenu berhasil ditambahkan');
    }

    public function edit(Submenu $submenu)
    {
        $menus = Menu::all(); // Menampilkan semua menu
        return view('dashboard.pages.submenu.edit', compact('submenu', 'menus'));
    }

    public function update(Request $request, Submenu $submenu)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'nama_submenu' => 'required',
            'link_submenu' => 'required',
            'icon_submenu' => 'nullable',
        ]);

        $submenu->update($validated);

        return redirect()->route('submenu.index')->with('success', 'Submenu berhasil diupdate');
    }

    public function destroy(Submenu $submenu)
    {
        $submenu->delete();

        return redirect()->route('submenu.index')->with('success', 'Submenu berhasil dihapus');
    }
}
