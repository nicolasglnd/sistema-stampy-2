<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; // Importar la clase DB

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['tipo_rol' => 'Administrador'],
            ['tipo_rol' => 'Estampador'],
            ['tipo_rol' => 'Diseñador Grafico'],
            ['tipo_rol' => 'Vendedor'],
        ]);
    }
}
