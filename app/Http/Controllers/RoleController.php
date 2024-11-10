<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.pages.role.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.pages.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:255',
        ]);

        Role::create([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('role.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('dashboard.pages.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nama_role' => 'required|string|max:255',
        ]);

        $role->update([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully.');
    }
}
