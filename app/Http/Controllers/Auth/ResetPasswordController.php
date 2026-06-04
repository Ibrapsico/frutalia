<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{

    // - Mostramos formulario de reseteo:
    public function show(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // - Procesamos el reseteo:
    public function reset(ResetPasswordRequest $request)
    {
        // - Guardamos un nuevo array usando nuestra clase request para traer los datos ya validados:
        $validated = $request->validated();

        //  - Hacemos el reseteo:
        $status = Password::reset(
            // - Credenciales nuevas validadas:
            $validated,

            // - Callback que se ejecuta si todo ha ido bien (se cambia y guarda la contraseña nueva). 
            // El $password se saca internanemtente del nuevo array validated que le hemos pasado:
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );


        // - Retronamos con redirección al login y mensajeFeedback:
        if ($status === Password::PASSWORD_RESET) {
            return redirect()
                ->route('login')
                ->with('status', "Has actualizado tu contraseña.");
        }
        
        // - Si no, volvemos atrás con mensaje específico de error (específico del campo):
        return back()
            ->withErrors(['email', 'No se ha podido restablecer tu contraseña.']);
        
    }
}

