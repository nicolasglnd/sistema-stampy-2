<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Inventario;
use App\Models\User;
use App\Models\Persona;
use App\Models\Empleado;

class InventarioTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    #[\PHPUnit\Framework\Attributes\Test]
    public function unUsuarioCreaInsumoEnInventario(): void
    {

        //crea usuario
        $persona = Persona::factory()->create();
        Empleado::factory()->create(['id' => $persona->id]);
        $user = User::factory()->create(['id' => $persona->id]);

        //autentica usuaior
        $this->actingAs($user);

        //Datos del insumo a crear
        $insumoData = [
            'nombre' => 'Insumo de prueba final',
            'cantidad' => 10,
            'medida' => 'kg',
        ];

        $response = $this->post('/inventario', $insumoData);

        //verificar la creación
        $response->assertStatus(302);
        $this->assertDatabaseHas('inventarios', [
            'nombre' => 'Insumo de prueba final',
            'cantidad' => 10,
            'medida' => 'kg',
        ]);

        $this->post('/logout');
    }
}
