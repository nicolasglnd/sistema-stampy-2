<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar la clase DB

class inventariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventarios')->insert([
            [
                'nombre' => 'Pintura plastisol negro',
                'cantidad' => 5,
                'medida' => 'Kg'
            ],
            [
                'nombre' => 'Extender textil',
                'cantidad' => 10,
                'medida' => 'Kg'
            ],
            [
                'nombre' => 'Emulsión textil',
                'cantidad' => 3,
                'medida' => 'Kg'
            ],
            [
                'nombre' => 'Polietileno',
                'cantidad' => 6,
                'medida' => 'Kg'
            ],
        ]);
    }
}
