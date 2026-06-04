<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    
    // - Mostramos el formulario de login:
    public function show()
    {
        return view('auth.login');
    }


    // - Procesamos intento de login:
    public function login(LoginRequest $request)
    {
        // - Guardamos un nuevo array usando nuestra clase request para traer los datos ya validados:
        $credentials = $request->validated();    


        // - Promabos a verificar el user usando hash (SEGURIDAD):
        if (Auth::attempt($credentials)) {
            // - (SEGURIDAD) Creamos un nuevo ID de sesión pero manteniendo lso datos (evitar ataques de fijación de sesión):
            $request->session()->regenerate();
            
            // - Redirigimos al login o a donde quisiera entrar anted de loguerase:
            return redirect()
                ->intended(route('home'))
                ->with('success', 'Has iniciado sesión.');
        }

        // - Si no se han podido verificar sus credenciales, devolvemos mensaje genérico (SEGURIDAD):
        return back()
            ->withErrors([
                'email', 'Credenciales incorrectas, vuelve a intentarlo',
            ])
            ->withInput(['email']); // Dejamos el campo del correo escrto para que no tenga que volver a escribirlo;
    }


    
    // - Cerramos sesión:
    public function logout(Request $request)
    {
        // - Eliminamos al user de la sesión actual:
        Auth::logout();

        // - (SEGURIDAD) Vaciamos todos los datos de la sesión:
        $request->session()->invalidate();

        // - (SEGURIDAD) Regeneramos el token CSRF de lso formularios (se borra la anterior):
        $request->session()->regenerateToken();

        // - Mostramos el formulario del login:
        return redirect()
            ->route('login')
            // - Con mensaje feedback:
            ->with('Success', 'Sesión cerrada correctamente. ¡Hasta pronto!');
    }
}

