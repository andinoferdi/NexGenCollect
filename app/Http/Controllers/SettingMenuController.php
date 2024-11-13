<?php

namespace App\Http\Controllers;

use App\Models\SettingMenu;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;

class SettingMenuController extends Controller
{
    public function index()
    {
        $settings = SettingMenu::with(['role', 'menu'])
            ->get()
            ->groupBy(['role_id', 'menu_id']);
        return view('dashboard.pages.setting_menus.index', compact('settings'));
    }

    public function create()
    {
        $roles = Role::all();
        $menus = Menu::all(); // Only menus, no submenus needed
        return view('dashboard.pages.setting_menus.create', compact('roles', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id',
        ]);

        $role_id = $request->input('role_id');
        SettingMenu::where('role_id', $role_id)->delete(); // Clear existing settings for this role

        foreach ($request->menu_id as $menu_id) {
            SettingMenu::create([
                'role_id' => $role_id,
                'menu_id' => $menu_id,
            ]);
        }

        return redirect()->route('setting_menus.index')->with('success', 'Setting menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $menus = Menu::all(); // Only menus, no submenus needed
        $selectedSettings = SettingMenu::where('role_id', $id)->get()->groupBy('menu_id');

        return view('dashboard.pages.setting_menus.edit', compact('roles', 'menus', 'selectedSettings', 'id'));
    }

    public function update(Request $request, $role_id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id',
        ]);

        SettingMenu::where('role_id', $role_id)->delete(); // Clear existing settings for this role

        foreach ($request->menu_id as $menu_id) {
            SettingMenu::create([
                'role_id' => $role_id,
                'menu_id' => $menu_id,
            ]);
        }

        return redirect()->route('setting_menus.index')->with('success', 'Setting menu berhasil diupdate');
    }

    public function destroy($id)
    {
        $settingMenu = SettingMenu::find($id);
        if ($settingMenu) {
            $settingMenu->delete();
            return redirect()->route('setting_menus.index')->with('success', 'Setting menu deleted successfully');
        }

        return redirect()->route('setting_menus.index')->with('error', 'Setting menu not found');
    }
}
