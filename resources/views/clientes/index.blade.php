@extends('layouts.app')

@section('titulo', 'Clientes')
@section('cabecera', 'clientes')

@section('contenido')

    {{-- boton crear --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('clientes.create') }}" class="btn btn-outline">Nuevo cliente</a>
    </div>

    {{-- grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-6 --}}
    <div id="index-cliente" class="flex flex-wrap justify-center gap-4 m-4 ">

        @foreach($clientes as $cliente)
            <div class="card bg-primary text-primary-content w-96 shadow-x1 m-8 p-4">
                <div class="card-body">
                    @php
                        $primerNombre = $cliente->persona->primer_nombre;
                        $segundoNombre = $cliente->persona->segundo_nombre;
                        $primerApellido = $cliente->persona->primer_apellido;
                        $segundoApellido = $cliente->persona->segundo_apellido;
                        $nombreCompleto = $primerNombre . " " . $segundoNombre . " " . $primerApellido . " " . $segundoApellido;
                        $titulo = $cliente->entidad ? $cliente->entidad : $nombreCompleto;
                    @endphp
                    <h2 class="card-title">{{ $titulo }}</h2>
                    <p><strong>ID: </strong><span>{{ $cliente->id }}</span></p>
                    <p><strong>Primer Nombre: </strong><span>{{ $primerNombre }}</span></p>
                    <p><strong>Segundo Nombre: </strong><span>{{ $segundoNombre }}</span></p>
                    <p><strong>Primer Apellido: </strong><span>{{ $primerApellido }}</span></p>
                    <p><strong>Segundo Apellido: </strong><span>{{ $segundoApellido }}</span></p>
                    <p><strong>Entidad: </strong><span>{{ $cliente->entidad }}</span></p>
                    <p><strong>Dirección: </strong><span>{{ $cliente->persona->direccion }}</span></p>
                    <p><strong>Telefono 1: </strong><span>{{ $cliente->persona->telefono_1 }}</span></p>
                    <p><strong>Telefono 2: </strong><span>{{ $cliente->persona->telefono_2 }}</span></p>
                    <p><strong>ID tipo Documento: </strong><span>{{ $cliente->persona->id_tipo_doc }}</span></p>
                    <p><strong>Documento de Identificación: </strong><span>{{ $cliente->persona->documento_id }}</span></p>
                    <p><strong>¿El cliente debe algo?: </strong><span>{{ $cliente->debe ? 'Si' : 'No' }}</span></p>
                    <p><strong>Credito Contable: </strong><span>{{ $cliente->credito_contable }}</span></p>
                    <p><strong>Email de la Entidad: </strong><span>{{ $cliente->email_entidad }}</span></p>
                    <p><strong>Email del responsable: </strong><span>{{ $cliente->email_responsable }}</span></p>
                    <p><strong>Telefono del Responsable: </strong><span>{{ $cliente->telefono_responsable }}</span></p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-outline btn-xs">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
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