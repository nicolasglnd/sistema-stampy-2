<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar la clase DB

class empleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Insertar en la tabla 'personas' y obtener el ID
        $personaIdAdmin = DB::table('personas')->insertGetId([
            'primer_nombre' => 'Administrador',
            'segundo_nombre' => '',
            'primer_apellido' => 'Admin',
            'segundo_apellido' => '',
            'direccion' => 'remoto',
            'telefono_1' => '1234567890',
            'telefono_2' => '',
            'id_tipo_doc' => 1,
            'documento_id' => '1234567890'
        ]);

        //Insertar en la tabla 'empleados' usando el ID de 'personas'
        DB::table('empleados')->insert([
            'id' => $personaIdAdmin, // Utilizar el ID de la persona
            'eps' => 'Salud Total',
            'activo' => true,
            'logro_academico' => 'Universitario',
            'arl' => 'Porvenir',
            'caja_compensacion' => 'Comfatolima',
            'fondo_pension' => 'Colpensiones',
            'salario' => 0,
            'id_rol' => 1,
            'email' => 'admin@example.com',
            'fecha_nacimiento' => '1999-06-20',
            'fecha_ingreso' =>'2025-02-01'
        ]);

        //Insertar en la tabla 'personas' y obtener el ID
        $personaId1 = DB::table('personas')->insertGetId([
            'primer_nombre' => 'Jorge',
            'segundo_nombre' => '',
            'primer_apellido' => 'Mendez',
            'segundo_apellido' => 'Gonzales',
            'direccion' => 'Cra 8 #18-25',
            'telefono_1' => '310824318',
            'telefono_2' => '',
            'id_tipo_doc' => 1,
            'documento_id' => '1110473268'
        ]);

        //Insertar en la tabla 'empleados' usando el ID de 'personas'
        DB::table('empleados')->insert([
            'id' => $personaId1, // Utilizar el ID de la persona
            'eps' => 'Salud Total',
            'activo' => true,
            'logro_academico' => 'Bachiller',
            'arl' => 'Porvenir',
            'caja_compensacion' => 'Comfatolima',
            'fondo_pension' => 'Colpensiones',
            'salario' => 1300000,
            'id_rol' => 2,
            'email' => 'jorgemg@example.com',
            'fecha_nacimiento' => '2002-05-22',
            'fecha_ingreso' =>'2025-02-01'
        ]);

        //Insertar en la tabla 'personas' y obtener el ID
        $personaId1 = DB::table('personas')->insertGetId([
            'primer_nombre' => 'Maria',
            'segundo_nombre' => 'Lizeth',
            'primer_apellido' => 'Gomez',
            'segundo_apellido' => '',
            'direccion' => 'Cra 7 #25-10',
            'telefono_1' => '310858328',
            'telefono_2' => '',
            'id_tipo_doc' => 1,
            'documento_id' => '98429761'
        ]);

        //Insertar en la tabla 'empleados' usando el ID de 'personas'
        DB::table('empleados')->insert([
            'id' => $personaId1, // Utilizar el ID de la persona
            'eps' => 'Salud Total',
            'activo' => true,
            'logro_academico' => 'Tecnico',
            'arl' => 'Porvenir',
            'caja_compensacion' => 'Comfatolima',
            'fondo_pension' => 'Colpensiones',
            'salario' => 1300000,
            'id_rol' => 3,
            'email' => 'marialig@example.com',
            'fecha_nacimiento' => '1991-12-08',
            'fecha_ingreso' =>'2025-02-01'
        ]);

    }
}
