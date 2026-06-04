<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Support\AuthRules;
use App\Support\AuthMessagges;


class RegisterRequest extends FormRequest
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
            'name' => AuthRules::name(),
            'email' => AuthRules::emailUnique(),
            'phone' => AuthRules::phone(),
            'address' => AuthRules::address(),
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
            AuthMessagges::name(),
            AuthMessagges::emailUnique(),
            AuthMessagges::phone(),
            AuthMessagges::address(),
            AuthMessagges::passwordConfirmed()
        );
    }




}

