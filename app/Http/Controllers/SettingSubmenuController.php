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
        $settings = SettingSubmenu::with(['role', 'menu', 'submenu'])
            ->get()
            ->groupBy('role_id'); // Group by role_id to show only one row per role

        return view('dashboard.pages.setting_submenus.index', compact('settings'));
    }

    public function create()
{
    $assignedRoleIds = SettingSubmenu::distinct()->pluck('role_id');
    $roles = Role::whereNotIn('id', $assignedRoleIds)->get();
    $menus = Menu::with('submenus')->get();

    return view('dashboard.pages.setting_submenus.create', compact('roles', 'menus'));
}


    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id',
            'submenu_id' => 'required|array',
            'submenu_id.*' => 'exists:submenus,id',
        ]);

        $role_id = $request->input('role_id');
        SettingSubmenu::where('role_id', $role_id)->delete(); // Clear existing settings for this role

        foreach ($request->menu_id as $index => $menu_id) {
            SettingSubmenu::create([
                'role_id' => $role_id,
                'menu_id' => $menu_id,
                'submenu_id' => $request->submenu_id[$index],
            ]);
        }

        return redirect()->route('setting_submenus.index')->with('success', 'Setting Submenu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $menus = Menu::with('submenus')->get(); // Get menus along with their submenus
        $selectedSettings = SettingSubmenu::where('role_id', $id)->get()->groupBy('menu_id');

        return view('dashboard.pages.setting_submenus.edit', compact('roles', 'menus', 'selectedSettings', 'id'));
    }

    public function update(Request $request, $role_id)
{
    $request->validate([
        'role_id' => 'required|exists:roles,id',
        'menu_id' => 'required|array',
        'menu_id.*' => 'exists:menus,id',
        'submenu_id' => 'sometimes|array',
        'submenu_id.*' => 'exists:submenus,id',
    ]);

    SettingSubmenu::where('role_id', $role_id)->delete(); // Clear existing settings for this role

    foreach ($request->menu_id as $index => $menu_id) {
        // Pastikan submenu_id ada pada request dan sesuai index
        if (isset($request->submenu_id[$index])) {
            SettingSubmenu::create([
                'role_id' => $role_id,
                'menu_id' => $menu_id,
                'submenu_id' => $request->submenu_id[$index],
            ]);
        }
    }

    return redirect()->route('setting_submenus.index')->with('success', 'Setting Submenu berhasil diupdate');
}


    public function destroy($role_id)
{
    $deletedRows = SettingSubmenu::where('role_id', $role_id)->delete();
    if ($deletedRows) {
        return redirect()->route('setting_submenus.index')->with('success', 'Setting Submenu berhasil dihapus');
    }

    return redirect()->route('setting_submenus.index')->with('error', 'Setting Submenu tidak ditemukan');
}

}
