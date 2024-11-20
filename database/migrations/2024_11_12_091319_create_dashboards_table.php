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
        Schema::create('dashboards', function (Blueprint $table) {

            $table->unsignedBigInteger('id'); // Crea una columna 'id' sin auto increment
            $table->boolean('recibido');
            $table->boolean('dibujado');
            $table->boolean('estampado');
            $table->boolean('cobrado_entregado');
            $table->unsignedBigInteger('id_cliente');
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
                ->onUpdate('NO ACTION'); // Índices únicos $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboards');
    }
};
