<?php

namespace Database\Seeders;

use App\Models\Inventario;
use App\Models\Persona;
use App\Models\Empleado;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 6; $i++) {
            $persona = Persona::factory()->create();
            Empleado::factory()->create(['id' => $persona->id]);
            User::factory()->create(['id' => $persona->id]);
        }

    }
}
