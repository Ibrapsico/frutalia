<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Support\AuthRules;
use App\Support\AuthMessagges;


class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * - Devuelve las reglas de validación que se aplican a la petición.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => ['requierd'],
            'email' => AuthRules::email(),
            'password' => AuthRules::passwordConfirmed()
        ];
    }


    /**
     * - Devuelve mensajes de error para las validaciones de la petición.
     * @return array
     */
    public function messages(): array
    {
        return array_merge(
            // - Para el token dejamos un mensaje genérico (SEGURIDAD):
            ['token.required' => 'El enlace de recuperación no es válido o ha expirado.'],        
            AuthMessagges::email(),
            AuthMessagges::passwordConfirmed()
        );
    }
}

