<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarios = Inventario::all();
        return response()->json($inventarios, 200); //200 ok
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos=$request->validate([
            'nombre'=>['required', 'string', 'max:70'],
            'cantidad'=>['required', 'numeric'],
            'medida'=>['required', 'string', 'max:20'],
        ]);

        //guardar
        $inventario = Inventario::create($datos);

        //respuesta cliente
        return response()->json(['success' => true, 'message' => 'Articulo de inventario creado'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        return response()->json($inventario, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {

        $datos=$request->validate([
            'nombre'=>['required', 'string', 'max:70'],
            'cantidad'=>['required', 'numeric'],
            'medida'=>['required', 'string', 'max:20'],
        ]);

        //actualizar
        $inventario->update($datos);

        //respuesta cliente
        return response()->json(['success' => true, 'message' => 'Articulo de inventario actualizado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        //eliminar
        $inventario->delete();

        //respuesta
        return response()->json(['success' => true, 'message' => 'Articulo de inventario eliminado'], 200);

    }
}
