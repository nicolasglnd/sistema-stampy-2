<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar la clase DB

class tiposDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_documentos')->insert([
            ['tipo_documento' => 'Cédula de Ciudadanía'],
            ['tipo_documento' => 'Número de Identificación Tributaria'],
            ['tipo_documento' => 'Cédula de Extranjería'],
            ['tipo_documento' => 'Registro Civil'],
            ['tipo_documento' => 'Licencia de Conducción'],
        ]);
    }
}
