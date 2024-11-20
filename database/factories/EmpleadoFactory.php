<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empleado;
use App\Models\Persona;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleados>
 */
class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Persona::factory(),     //relación persona
            'id_rol' => $this->faker->numberBetween(1, 4),
            'email' => $this->faker->unique()->safeEmail(),
            'logro_academico' => $this->faker->text(50),
            'activo' => $this->faker->boolean(),
            'salario' => $this->faker->numberBetween(1000000, 9000000),
            'eps' => $this->faker->company(),
            'arl' => $this->faker->company(),
            'caja_compensacion' => $this->faker->company(),
            'fondo_pension' => $this->faker->company(),
            'fecha_nacimiento' => $this->faker->date(),
            'fecha_ingreso' => $this->faker->date()
        ];
    }
}
