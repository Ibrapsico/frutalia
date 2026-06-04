<?php

namespace App\Models;



use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{

    use HasFactory, Notifiable;


    // - Definimos campos que pueden ser asignados para poder usar "create()" de Eloquent:
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
    ];


    // - (SEGURIDAD) Los campos que no van a estar visibles al serializar (si los llamas de forma explícita sí puedes acceder a ellas):
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    // - Propiedad para convertir automáticamente tipos de datos (fecha y booleano):
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // =========================
    // === RELACIÓN ROLES ===
    // =========================
    
    // - Relación de a muchos con tabla roles:
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // - Creamos método para verificar si un user tiene un rol determinado (para no repetir código):
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

}

