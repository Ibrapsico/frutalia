<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;





class RegisterController extends Controller
{
    
    // - Mostrams el formulario de registro:
    public function show()
    {
        return view('auth.register');
    }


    // - Procesamos el registro del usuario con nuestra calse Request para validar:
    public function register(RegisterRequest $request)
    {
        // - Guardamos un nuevo array usando nuestra clase para traer los datos ya validados:
        $validated = $request->validated();
        
        // - Añadimos el user nuevo en la DB:
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'address' => $validated['address']
            
        ]);


        // - Le asignamos al nuevo usuario un rol por defecto:
        $customerRole = Role::where('name', 'customer')->first();
        $user->roles()->attach($customerRole);


        // - Iniciamos sesión con el user recién creado usando la autenticación de Laravel (Facade):
        auth()->login($user);


        // - Redirigimos al home ocn mensaje:
        return redirect()
            ->route('home')
            ->with('success', '¡Has iniciado sesión!');
    }
}

