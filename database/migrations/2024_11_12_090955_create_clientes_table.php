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
        Schema::create('clientes', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Crea una columna 'id' sin auto increment
            $table->string('entidad', 60)->nullable();
            $table->decimal('debe', 10, 2)->default(0);
            $table->boolean('credito_contable')->default(true);
            $table->string('email_entidad', 50);
            $table->string('email_responsable', 50);
            $table->string('telefono_responsable', 25);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            
            // Índices únicos
            $table->unique('id', 'id_UNIQUE');
            
            // Relaciones
            $table->foreign('id')
                ->references('id')
                ->on('personas')
                ->onDelete('CASCADE')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
