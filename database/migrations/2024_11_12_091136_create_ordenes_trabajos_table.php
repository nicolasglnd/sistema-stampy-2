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
        Schema::create('ordenes_trabajos', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' como clave primaria auto incrementada
            $table->unsignedTinyInteger('total_cantidad_estampados');
            $table->unsignedInteger('total_cantidad_prendas');
            $table->unsignedBigInteger('id_cliente');
            $table->string('descripcion', 255)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            
            // Índices
            $table->index('id_cliente', 'id_cliente_idx');

            // Relaciones
            $table->foreign('id_cliente')
                ->references('id')
                ->on('clientes')
                ->onDelete('CASCADE')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_trabajos');
    }
};
