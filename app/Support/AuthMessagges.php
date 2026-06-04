<?php

namespace App\Support;


/**
 * Clase Request con métodos estáticos reutilizables.
 */
class AuthMessagges {
    


    /**
     * - Método para devolver mensajes de error para la validación del email.
     */
    public static function email(): array
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido (ej: juan@gmail.com).'
        ];
    }


    /**
     * - Método para devolver mensajes de error para la validación del email cuando debe ser único en la DB.
     */
    public static function emailUnique(): array
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido (ej: juan@gmail.com).',
            'email.unique' => 'Parece que el correo propocionado ya está registrado.'
        ];
    }


    /**
     * - Método para devolver mensajes de error para la validación del email cuando debe EXISTIR ya en la DB.
     */
    public static function emailExists(): array
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido (ej: juan@gmail.com).',
            'email.exists' => 'Parece que el correo propocionado no está registrado.'
        ];
    }


    /**
     * - Método para devolver mensajes de error para la validación de contraseña.
     */
    public static function password(): array
    {
        return [
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres'
        ];
    }


    /**
     * - Método para devolver mensajes de error para la validación de contraseña confirmable.
     */
    public static function passwordConfirmed(): array
    {
        return [
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas deben coincidir'
        ];
    }


    /**
     * - Método para devolver mensajes de error para la validación del nombre.
     */
    public static function name(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe tener un formato de texto válido. (ej: Juan González, juan gonzález, etc.).',
            'name.min' => 'El nombre debe tener un mínimo de 3 caracteres.',
            'name.max' => 'El nombre puede tener un máximo de 255 caracteres.'
        ];
    }


    /**
     * - Método para devolver mensajes de error para la validación del teléfono.
     */
    public static function phone(): array
    {
        return [
            'phone.string' => 'El teléfono debe tener un formato de texto válido. (ej: 612345678, 034612345678, +34612345678).',
            'phone.min' => 'El teléfono debe tener un mínimo de 9 caracteres.',
            'phone.max' => 'El teléfono puede tener un máximo de 15 caracteres.'
        ];
    }


    /**
     * - Método para devolver mensajes de error para la validación de la dirección fisica.
     */
    public static function address(): array
    {
        return [
            'address.string' => 'La dirección física debe tener un formato de texto válido. (ej: c/Ficticia 3, Madrid).',
            'address.max' => 'El dirección física puede tener un máximo de 255 caracteres.'
        ];
    }



}

