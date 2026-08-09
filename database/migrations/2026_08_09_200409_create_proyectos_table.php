<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
     * Crea la tabla proyectos con los campos
     * solicitados en la evaluación.
     */
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            // Identificador único del proyecto.
            $table->id();

            // Nombre del proyecto.
            $table->string('nombre');

            // Fecha en que comienza el proyecto.
            $table->date('fecha_inicio');

            // Estado actual del proyecto.
            $table->string('estado');

            // Persona responsable del proyecto.
            $table->string('responsable');

            // Monto asociado al proyecto.
            $table->decimal('monto', 12, 2);

            // ID del usuario que creó el proyecto.
            $table->foreignId('created_by');

            // Fecha de creación y actualización.
            $table->timestamps();

            /*
             * Relaciona created_by con el ID de la tabla users.
             */
            $table->foreign('created_by')
                  ->references('id')
                  ->on('users');
        });
    }

    /*
     * Elimina la tabla si se deshace la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
