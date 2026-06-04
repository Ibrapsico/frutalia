<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    
    // - Mostramos formulario de contraseña olvidada:
    public function show()
    {
        return view('auth.forgot-password');
    }


    // - Procesamos el reseteo de contraseña:
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        // - Guardamos un nuevo array usando nuestra clase request para traer los datos ya validados (validamos el correo que haya puesto):
        $validated = $request->validated();   


        // 1. Laravel busca el usuario por ese email;
        // 2. Genera un token único;
        // 3. Construye un enlace para enviar;
        // 4. Envía un email al usuario con el enlace;
        // 5. Devuelve un string de status (enviado o error);
        $status = Password::sendResetLink($validated);

        // - Si se ha enviado correctamente (reset status es ok), volvemos atrás con mensaej de feedback:
        if ($status === Password::RESET_LINK_SENT) {
            return back()
                ->with('status', "Hemos enviado a tu correo un enlace para restablecer tu contraseña.");
        }

        // - Si el status tenía errores, volvemos atrás con mensaje de error específico asociado al campo "email" (se guarda en errors[], pero lo puedes 
        // sacar directamente con $message, de Laravel):
        return back()
            ->withErrors('email', "No hemos encontrado ninguna cuenta con ese correo, asegúrate de escribirlo correctamente.");
        
    }
}

