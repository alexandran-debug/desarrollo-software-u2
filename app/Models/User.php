<?php

namespace App\Models;

use App\Models\Proyecto;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['nombre', 'correo', 'clave'])]
#[Hidden(['clave', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    // Indica que este modelo utiliza la tabla "users".
    protected $table = 'users';

    /*
     * Define el tratamiento que tendrá la clave.
     * Laravel aplicará hashing automáticamente.
     */
    protected function casts(): array
    {
        return [
            'clave' => 'hashed',
        ];
    }

    /*
     * Indica a Laravel cuál es el campo utilizado
     * como contraseña para la autenticación.
     */
    public function getAuthPassword(): string
    {
        return $this->clave;
    }

    /*
     * Un usuario puede tener varios proyectos.
     */
    public function proyectos(): HasMany
    {
        return $this->hasMany(Proyecto::class, 'created_by');
    }
}
