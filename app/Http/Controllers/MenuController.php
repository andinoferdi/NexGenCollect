<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('submenus')->get();
        return view('dashboard.pages.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('dashboard.pages.menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required',
            'icon_menu' => 'nullable',
        ]);

        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(Menu $menu)
    {
        return view('dashboard.pages.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'nama_menu' => 'required',
            'icon_menu' => 'nullable',
        ]);

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }
}
