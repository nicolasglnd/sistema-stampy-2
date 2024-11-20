@extends('layouts.app')

@section('titulo', 'Pagina Principal')
@section('cabecera', 'Inventario ')

@section('contenido')

    {{-- boton crear --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('inventario.create') }}" class="btn btn-outline">Nuevo Insumo</a>
    </div>

    {{-- grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-6 --}}
    <div id="index-inventario" class="flex flex-wrap justify-center gap-4 m-4 ">

        @foreach($inventarios as $inventario)
            <div class="card bg-primary text-primary-content w-96 shadow-x1 m-8 p-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $inventario->nombre }}</h2>
                    <p><strong>Cantidad: </strong><span>{{ $inventario->cantidad }}</span></p>
                    <p><strong>Medida: </strong><span>{{ $inventario->medida }}</span></p>
                    <p><strong>ID: </strong><span>{{ $inventario->id }}</span></p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('inventario.edit', $inventario->id) }}" class="btn btn-outline btn-xs">Editar</a>
                        <form action="{{ route('inventario.destroy', $inventario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline- btn-xs">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection