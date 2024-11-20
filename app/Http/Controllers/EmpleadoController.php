<?php

namespace App\Http\Controllers;
//cambie en update, edit y destroy parametro de empleados a empleado
use App\Models\Empleado;
use App\Models\Persona;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with('persona')->get();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $persona = Persona::create($request->only([
            'primer_nombre',
            'segundo_nombre',
            'primer_apellido',
            'segundo_apellido',
            'direccion',
            'telefono_1',
            'telefono_2',
            'id_tipo_doc',
            'documento_id'
        ]));
        Empleado::create([
            'id' => $persona->id,
            'id_rol' => $request-> id_rol,
            'email' => $request-> email,
            'logro_academico' =>$request-> logro_academico,
            'activo' => $request->activo,
            'salario' => $request-> salario,
            'eps' => $request->eps,
            'arl' => $request-> arl,
            'caja_compensacion' => $request-> caja_compensacion,
            'fondo_pension' => $request-> fondo_pension,
            'fecha_nacimiento' => $request-> fecha_nacimiento,
            'fecha_ingreso' => $request-> fecha_ingreso
        ]);

        return redirect()->route('empleados.index')->with('info', 'Empleado creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', ['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
    // Validar los datos del formulario
    $request->validate([
        'primer_nombre' => 'required|string|max:255',
        'segundo_nombre' => 'nullable|string|max:255',
        'primer_apellido' => 'required|string|max:255',
        'segundo_apellido' => 'nullable|string|max:255',
        'direccion' => 'required|string|max:255',
        'telefono_1' => 'required|string|max:20',
        'telefono_2' => 'nullable|string|max:20',
        'id_tipo_doc' => 'required|integer',
        'documento_id' => 'required|string|max:20|unique:personas,documento_id,' . $empleado->persona->id,
        'id_rol' => 'required|integer',
        'email' => 'required|email|max:255|unique:empleados,email,' . $empleado->id,
        'logro_academico' => 'nullable|string|max:255',
        'activo' => 'required|boolean',
        'salario' => 'required|numeric',
        'eps' => 'required|string|max:255',
        'arl' => 'required|string|max:255',
        'caja_compensacion' => 'required|string|max:255',
        'fondo_pension' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'fecha_ingreso' => 'required|date',
    ]);

    // Actualizar la información de la persona
    $empleado->persona->update([
        'primer_nombre' => $request->primer_nombre,
        'segundo_nombre' => $request->segundo_nombre,
        'primer_apellido' => $request->primer_apellido,
        'segundo_apellido' => $request->segundo_apellido,
        'direccion' => $request->direccion,
        'telefono_1' => $request->telefono_1,
        'telefono_2' => $request->telefono_2,
        'id_tipo_doc' => $request->id_tipo_doc,
        'documento_id' => $request->documento_id,
    ]);

    // Actualizar la información del empleado
    $empleado->update([
        'id_rol' => $request->id_rol,
        'email' => $request->email,
        'logro_academico' => $request->logro_academico,
        'activo' => $request->activo,
        'salario' => $request->salario,
        'eps' => $request->eps,
        'arl' => $request->arl,
        'caja_compensacion' => $request->caja_compensacion,
        'fondo_pension' => $request->fondo_pension,
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'fecha_ingreso' => $request->fecha_ingreso,
    ]);

    //retornar
    return redirect()->route('empleados.index')->with('info', 'Empleado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $persona = $empleado->persona;
        $empleado->delete();
        if ($persona) {
            $persona->delete();
        }
        return redirect()->route('empleados.index')->with('info', 'Empleado eliminado con exito');
    }
}