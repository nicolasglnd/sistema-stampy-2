@extends('layouts.app')

@section('titulo', 'Crear Insumo')
@section('cabecera', 'Crear Insumo')

@section('contenido') 

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="{{ route('inventario.store') }}" method="POST">
                    @csrf
                    <div class="form-control">
	                    <label class="label" for="nombre">
	                        <span class="label-text">Nombre</span>
	                    </label>
	                    <input type="text" name="nombre" placeholder="Nombre insumo" maxlength="100" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="cantidad">
                            <span class="label-text">Cantidad</span>
                        </label>
                        <input type="number" name="cantidad" placeholder="Escriba la cantidad" maxlength="255" class="input input-bordered" />
                    </div>
                    <div class="form-control">
                        <label class="label" for="medida">
                            <span class="label-text">Medida</span>
                        </label>
                        <input type="text" name="medida" placeholder="Escriba la medida (ej: kg)" maxlength="255" class="input input-bordered" />
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Crear Insumo</button>
                        <a href="{{ route('inventario.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection