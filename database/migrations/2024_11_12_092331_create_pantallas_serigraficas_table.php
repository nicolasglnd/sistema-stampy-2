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
        Schema::create('pantallas_serigraficas', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' como clave primaria auto incrementada
            $table->string('nombre', 60);
            $table->unsignedInteger('id_pantalla_fisica')->nullable();
            $table->string('constancia_eliminacion', 150)->nullable();
            $table->string('ruta_dibujo', 200);
            $table->string('ruta_imagen_original', 200);
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_orden_trabajo');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            
            // Índices
            $table->index('id_usuario', 'id_usuario_idx');
            $table->index('id_orden_trabajo', 'id_orden_trabajo_idx');
            
            // Relaciones
            $table->foreign('id_usuario')
                ->references('id')
                ->on('users')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
                
            $table->foreign('id_orden_trabajo')
                ->references('id')
                ->on('ordenes_trabajos')
                ->onDelete('CASCADE')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pantallas_serigraficas');
    }
};
