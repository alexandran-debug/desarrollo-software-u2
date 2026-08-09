<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyecto extends Model
{
    /*
     * Campos que pueden ser asignados
     * al crear o actualizar un proyecto.
     */
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'estado',
        'responsable',
        'monto',
        'created_by',
    ];

    /*
     * Indica los tipos de datos que tendrá cada campo.
     */
    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date',
            'monto' => 'decimal:2',
        ];
    }

    /*
     * Cada proyecto pertenece a un usuario.
     * El campo created_by almacena el ID del usuario.
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
