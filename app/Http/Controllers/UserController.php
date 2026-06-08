<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->simplePaginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $roles = Role::all();
        return view('admin.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|min:3|max:255',
        'role' => 'required|exists:roles,id',
        'email' => 'required|email|max:255|unique:users,email',
        'phone' => 'nullable|string|min:9|max:15',
        'address' => 'nullable|string|max:255',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // - Una vez validado, separamos role del resto en el array:
    $roleId = $validated['role'];
    unset($validated['role']);

    $validated['password'] = Hash::make($validated['password']);

    $user = User::create($validated);

    // - Asignamosr rol en pivote:
    $user->roles()->attach($roleId);

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Nuevo usuario creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'role' => 'required|exists:roles,id',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|min:9|max:15',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // - Actualizamos datos de usuario:
        $user->update($validated);

        // - Actualizmso rol (tabla pivote); 
        // - Usamos sync (Elimina roles anteriores, ssigna el nuevo, evita duplicados):
            $user->roles()->sync([$validated['role']]);


        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Usuario actualizado.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Usuario eliminado con éxito.');
    }
}
