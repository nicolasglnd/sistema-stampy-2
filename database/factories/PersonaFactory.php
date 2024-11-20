<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Persona;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personas>
 */
class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'primer_nombre' => $this->faker->firstName(),
            'segundo_nombre' => $this->faker->optional()->firstName(),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->optional()->lastName(),
            'direccion' => $this->faker->address(),
            'telefono_1' => $this->faker->phoneNumber(),
            'telefono_2' => $this->faker->optional()->phoneNumber(),
            'id_tipo_doc' => $this->faker->numberBetween(1, 5),
            'documento_id' => $this->faker->unique()->numerify('##########')
        ];
    }
}
