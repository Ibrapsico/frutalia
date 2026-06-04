<?php

namespace App\Support;


/**
 * Clase Request con métodos estáticos reutilizables.
 */
class AuthRules {
    

    /**
     * - Método para validar email, es obligatoria y debe ser un correo válido.
     */
    public static function email(): array
    {
        return ['required', 'email'];
    }


    /**
     * - Método para validar email, es obligatoria, debe ser un correo válido y NO EXISTIR en la DB.
     */
    public static function emailUnique(): array
    {
        return ['required', 'email', 'unique:users,email'];
    }


    /**
     * - Método para validar email, es obligatoria, debe ser un correo válido y EXISTIR en la DB.
     */
    public static function emailExists(): array
    {
        return ['required', 'email', 'exists:users,email'];
    }


    /**
     * - Método para validar contraseña, es obligatoria y mínimo de 8 caracteres.
     */
    public static function password(): array
    {
        return ['required', 'min:8'];
    }


    /**
     * - Método para validar contraseña confirmable, es obligatoria, mínimo de 8 caracteres y deben coincidir los dos campos para confirmar.
     */
    public static function passwordConfirmed(): array
    {
        return ['required', 'min:8', 'confirmed'];
    }


    /**
     * - Método para validar nombre, es obligatorio, debe ser un string, tener mínimo 3 y máximo de 255 caracteres.
     */
    public static function name(): array
    {
        return ['required', 'string', 'min:3', 'max:255'];
    }


    /**
     * - Método para validar teléfono, puede quedar vacío, debe ser un string, tener mínimo 9 y máximo de 15 caracteres.
     */
    public static function phone(): array
    {
        return ['nullable', 'string', 'min:9', 'max:15'];
    }


    /**
     * - Método para validar dirección física, puede quedar vacío, debe ser un string y máximo de 500 caracteres.
     */
    public static function address(): array
    {
        return ['nullable', 'string', 'max:255'];
    }

}


