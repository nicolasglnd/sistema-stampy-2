<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; //importar la clase DB


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {

            $table->unsignedBigInteger('id'); // Crea una columna 'id' sin auto increment
            $table->string('eps', 40);
            $table->boolean('activo');
            $table->string('logro_academico', 60)->nullable();
            $table->string('arl', 40);
            $table->string('caja_compensacion', 40)->nullable();
            $table->string('fondo_pension', 40);
            $table->decimal('salario', 10, 2);
            $table->unsignedInteger('id_rol');
            $table->string('email', 50)->unique();
            $table->date('fecha_nacimiento');
            $table->date('fecha_ingreso');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            
            // Índices
            $table->index('id_rol', 'id_rol_idx');

            // Relaciones
            $table->foreign('id_rol')
                ->references('id')
                ->on('roles')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
            
            $table->foreign('id')
                ->references('id')
                ->on('personas')
                ->onDelete('CASCADE')
                ->onUpdate('NO ACTION');
                
            // Índices únicos
            $table->unique('id', 'id_UNIQUE');
            $table->unique('email', 'email_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
