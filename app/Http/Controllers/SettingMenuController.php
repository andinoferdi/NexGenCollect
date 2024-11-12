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
        $settings = SettingMenu::with(['role', 'menu', 'submenu'])
                ->get()
                ->groupBy(['role_id', 'menu_id']);

        return view('dashboard.pages.setting_menus.index', compact('settings'));
    }

    public function create()
    {
        $roles = Role::all();
        $menus = Menu::with('submenus')->get();
        return view('dashboard.pages.setting_menus.create', compact('roles', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id',
            'submenu_ids' => 'array',
            'submenu_ids.*' => 'nullable|exists:submenus,id',
        ]);

        $role_id = $request->input('role_id');

        // Hapus pengaturan lama
        SettingMenu::where('role_id', $role_id)->delete();

        foreach ($request->menu_id as $menu_id) {
            // Simpan untuk menu utama tanpa submenu
            SettingMenu::create([
                'role_id' => $role_id,
                'menu_id' => $menu_id,
                'submenu_id' => null
            ]);

            // Simpan untuk submenu yang dipilih di bawah menu ini
            if (isset($request->submenu_ids[$menu_id])) {
                foreach ($request->submenu_ids[$menu_id] as $submenu_id) {
                    SettingMenu::create([
                        'role_id' => $role_id,
                        'menu_id' => $menu_id,
                        'submenu_id' => $submenu_id
                    ]);
                }
            }
        }

        return redirect()->route('setting_menus.index')->with('success', 'Setting menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $menus = Menu::with('submenus')->get();
        $selectedSettings = SettingMenu::where('role_id', $id)->get()->groupBy('menu_id');
        $selectedSubmenus = $selectedSettings->map(function($setting) {
            return $setting->pluck('submenu_id');
        });

        return view('dashboard.pages.setting_menus.edit', compact('roles', 'menus', 'selectedSettings', 'id', 'selectedSubmenus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id',
            'submenu_ids' => 'array',
            'submenu_ids.*' => 'nullable|exists:submenus,id',
        ]);

        $role_id = $request->input('role_id');

        // Delete previous settings for the role
        SettingMenu::where('role_id', $role_id)->delete();

        foreach ($request->menu_id as $menu_id) {
            // Create settings for main menu (without submenu)
            SettingMenu::create([
                'role_id' => $role_id,
                'menu_id' => $menu_id,
                'submenu_id' => null
            ]);

            // Create settings for selected submenus under this menu
            if (isset($request->submenu_ids[$menu_id])) {
                foreach ($request->submenu_ids[$menu_id] as $submenu_id) {
                    SettingMenu::create([
                        'role_id' => $role_id,
                        'menu_id' => $menu_id,
                        'submenu_id' => $submenu_id
                    ]);
                }
            }
        }

        return redirect()->route('setting_menus.index')->with('success', 'Setting menu berhasil diupdate');
    }

    public function destroy($id)
{
    $settingMenu = SettingMenu::find($id);
    if ($settingMenu) {
        SettingMenu::where('role_id', $settingMenu->role_id)
                   ->where('menu_id', $settingMenu->menu_id)
                   ->delete();

        return redirect()->route('setting_menus.index')->with('success', 'Setting menu and its submenus deleted successfully');
    }

    return redirect()->route('setting_menus.index')->with('error', 'Setting menu not found');
}

}
