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
        Schema::create('trabajos', function (Blueprint $table) {

            $table->id(); // Crea una columna 'id' como clave primaria auto incrementada
            $table->string('logotipo', 45);
            $table->unsignedTinyInteger('cantidad_colores');
            $table->string('colores', 150);
            $table->string('tipo_pintura', 45);
            $table->string('ubicacion_estampados', 150);
            $table->string('tamanio', 45);
            $table->unsignedTinyInteger('cantidad_estampados');
            $table->unsignedInteger('cantidad_prendas');
            $table->string('tipo_prendas', 45);
            $table->unsignedBigInteger('id_orden_trabajo');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            
            // Índices
            $table->index('id_orden_trabajo', 'id_orden_trabajo_idx');
            
            // Relaciones
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
        Schema::dropIfExists('trabajos');
    }
};
