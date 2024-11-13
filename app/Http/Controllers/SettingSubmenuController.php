<?php

namespace App\Http\Controllers;

use App\Models\SettingSubmenu;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;

class SettingSubmenuController extends Controller
{
    public function index()
    {
        $settings = SettingSubmenu::with(['role', 'menu', 'submenu'])->get();
        return view('dashboard.pages.setting_submenus.index', compact('settings'));
    }

    public function create()
    {
        $roles = Role::all();
        $menus = Menu::with('submenus')->get();
        return view('dashboard.pages.setting_submenus.create', compact('roles', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|exists:menus,id',
            'submenu_id' => 'required|exists:submenus,id',
        ]);

        SettingSubmenu::create([
            'role_id' => $request->role_id,
            'menu_id' => $request->menu_id,
            'submenu_id' => $request->submenu_id,
        ]);

        return redirect()->route('setting_submenus.index')->with('success', 'Setting Submenu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $menus = Menu::with('submenus')->get();
        $settingSubmenu = SettingSubmenu::findOrFail($id);
        return view('dashboard.pages.setting_submenus.edit', compact('roles', 'menus', 'settingSubmenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|exists:menus,id',
            'submenu_id' => 'required|exists:submenus,id',
        ]);

        $settingSubmenu = SettingSubmenu::findOrFail($id);
        $settingSubmenu->update([
            'role_id' => $request->role_id,
            'menu_id' => $request->menu_id,
            'submenu_id' => $request->submenu_id,
        ]);

        return redirect()->route('setting_submenus.index')->with('success', 'Setting Submenu berhasil diupdate');
    }

    public function destroy($id)
    {
        $settingSubmenu = SettingSubmenu::findOrFail($id);
        $settingSubmenu->delete();

        return redirect()->route('setting_submenus.index')->with('success', 'Setting Submenu berhasil dihapus');
    }
}
