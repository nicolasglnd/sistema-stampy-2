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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre', 45);
            $table->string('segundo_nombre', 45)->nullable();
            $table->string('primer_apellido', 45);
            $table->string('segundo_apellido', 45)->nullable();
            $table->string('direccion', 70);
            $table->string('telefono_1', 25);
            $table->string('telefono_2', 25)->nullable();
            $table->unsignedInteger('id_tipo_doc');
            $table->string('documento_id', 45)->unique();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            //indices
            $table->index('id_tipo_doc', 'id_tipo_doc_idx');

            //relaciones
            $table->foreign('id_tipo_doc')
                ->references('id')
                ->on('tipos_documentos')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
