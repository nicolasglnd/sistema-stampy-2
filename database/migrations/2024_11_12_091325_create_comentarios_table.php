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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' como clave primaria auto incrementada
            $table->string('mensaje', 255);
            $table->unsignedBigInteger('id_dashboard');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            
            // Índices
            $table->index('id_dashboard', 'id_dashboard_idx');
            $table->index('id_usuario', 'id_usuario_idx');

            // Relaciones
            $table->foreign('id_dashboard')
                ->references('id')
                ->on('dashboards')
                ->onDelete('CASCADE')
                ->onUpdate('NO ACTION');
            
            $table->foreign('id_usuario')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
