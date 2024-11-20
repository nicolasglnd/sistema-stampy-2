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
        Schema::create('costos_finales', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Crea una columna 'id' sin auto increment
            $table->unsignedTinyInteger('cantidad_dibujos');
            $table->decimal('costo_dibujos', 10, 2);
            $table->decimal('costo_grabados', 10, 2);
            $table->decimal('costo_estampados', 10, 2);
            $table->unsignedBigInteger('id_cliente');
            $table->decimal('costo_total', 10, 2);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Índices
            $table->index('id_cliente', 'id_cliente_idx');
            
            // Relaciones
            $table->foreign('id')
                ->references('id')
                ->on('ordenes_trabajos')
                ->onDelete('CASCADE')
                ->onUpdate('NO ACTION');

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
        Schema::dropIfExists('costos_finales');
    }
};
