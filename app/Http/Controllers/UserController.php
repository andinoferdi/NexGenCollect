<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('dashboard.pages.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('dashboard.pages.user.create', compact('roles'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role_id' => 'required|exists:roles,id',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $fotoPath = $request->file('foto') ? $request->file('foto')->store('user_photos', 'public') : null;

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id,
        'foto' => $fotoPath,
    ]);

    return redirect()->route('user.index')->with('success', 'User created successfully.');
}


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.pages.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->file('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto); // Menghapus foto lama jika ada
            }
            $data['foto'] = $request->file('foto')->store('user_photos', 'public'); // Menyimpan foto baru
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
