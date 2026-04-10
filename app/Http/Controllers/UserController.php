<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin') ? 1 : 0
        ]);

        return redirect()->route('admin-dashboard')
            ->with('success', 'Usuario registrado correctamente');
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'required',
        'password' => 'nullable|confirmed|min:6',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'is_admin' => $request->has('is_admin') ? 1 : 0
    ];

    // Solo si escribe nueva contraseña
    if ($request->filled('password')) {
        $data['password'] = \Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('admin-dashboard')
        ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin-dashboard')
            ->with('success', 'Usuario eliminado correctamente');
    }
}