<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index()
    {
        // - Sacamos los datos como objeto:
        $user = request()->user();

        return view('pages.profile', compact('user'));
    }




    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|min:9|max:15',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->address = $validated['address'] ?? null;

        // - Sólo cuando el campo no esté vacío. Hasheamos:
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // - Guardamos y retornamos con feedback:
        $user->save();
        return back()->with('success', 'Perfil actualizado');
    
    }


}
