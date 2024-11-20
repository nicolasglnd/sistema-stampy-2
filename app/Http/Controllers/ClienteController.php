<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with('persona')->get();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        Cliente::create([
            'id' => $persona->id,
            'entidad' => $request-> entidad,
            'email_entidad' => $request->email_entidad,
            'email_responsable' => $request-> email_responsable,
            'telefono_responsable' => $request->telefono_responsable,
        ]);

        return redirect()->route('clientes.index')->with('info', 'Cliente creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
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
            'documento_id' => 'required|string|max:20|unique:personas,documento_id,' . $cliente->persona->id,
            'entidad' => 'nullable|string',
            'debe' => 'required|numeric',
            'credito_contable' => 'required|boolean',
            'email_entidad' => 'required|email|max:255|unique:clientes,email_entidad,' . $cliente->id,
            'email_responsable' => 'required|email|max:255|unique:clientes,email_responsable,' . $cliente->id,
            'telefono_responsable' => 'required|string|max:20',
        ]);

        // Actualizar la información de la persona
        $cliente->persona->update([
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

        // Actualizar la información del cliente
        $cliente->update([
            'entidad' => $request->entidad,
            'debe' => $request->debe,
            'credito_contable' => $request->credito_contable,
            'email_entidad' => $request->email_entidad,
            'email_reponsable' => $request->email_reponsable,
            'telefono_reponsable' => $request->eps,
        ]);

        //retornar
        return redirect()->route('clientes.index')->with('info', 'Cliente actualizado con éxito');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $persona = $cliente->persona;
        $cliente->delete();
        if ($persona) {
            $persona->delete();
        }
        return redirect()->route('clientes.index')->with('info', 'Cliente eliminado con exito');
    }
}
