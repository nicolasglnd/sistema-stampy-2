@extends('layouts.app')

@section('titulo', 'Pagina Principal')
@section('cabecera', 'Empleados')

@section('contenido')

    {{-- boton crear --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('empleados.create') }}" class="btn btn-outline">Nuevo Empleado</a>
    </div>

    {{-- grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-6 --}}
    <div id="index-empleado" class="flex flex-wrap justify-center gap-4 m-4 ">

        @foreach($empleados as $empleado)
            <div class="card bg-primary text-primary-content w-96 shadow-x1 m-8 p-4">
                <div class="card-body">
                    @php
                        $primerNombre = $empleado->persona->primer_nombre;
                        $segundoNombre = $empleado->persona->segundo_nombre;
                        $primerApellido = $empleado->persona->primer_apellido;
                        $segundoApellido = $empleado->persona->segundo_apellido;
                        $nombreCompleto = $primerNombre . " " . $segundoNombre . " " . $primerApellido . " " . $segundoApellido;
                    @endphp
                    <h2 class="card-title">{{ $nombreCompleto }}</h2>
                    <p><strong>ID: </strong><span>{{ $empleado->id }}</span></p>
                    <p><strong>Primer Nombre: </strong><span>{{ $primerNombre }}</span></p>
                    <p><strong>Segundo Nombre: </strong><span>{{ $segundoNombre }}</span></p>
                    <p><strong>Primer Apellido: </strong><span>{{ $primerApellido }}</span></p>
                    <p><strong>Segundo Apellido: </strong><span>{{ $segundoApellido }}</span></p>
                    <p><strong>Dirección: </strong><span>{{ $empleado->persona->direccion }}</span></p>
                    <p><strong>Telefono 1: </strong><span>{{ $empleado->persona->telefono_1 }}</span></p>
                    <p><strong>Telefono 2: </strong><span>{{ $empleado->persona->telefono_2 }}</span></p>
                    <p><strong>Tipo de Documento: </strong><span>{{ $empleado->persona->tipoDocumento->tipo_documento }}</span></p>
                    <p><strong>Documento de Identificación: </strong><span>{{ $empleado->persona->documento_id }}</span></p>
                    <p><strong>EPS: </strong><span>{{ $empleado->eps }}</span></p>
                    <p><strong>Activo: </strong><span>{{ $empleado->activo ? 'Si' : 'No' }}</span></p>
                    <p><strong>Logro Academico: </strong><span>{{ $empleado->logro_academico }}</span></p>
                    <p><strong>ARL: </strong><span>{{ $empleado->arl }}</span></p>
                    <p><strong>Caja de Compensación: </strong><span>{{ $empleado->caja_compensacion }}</span></p>
                    <p><strong>Fondo de Pesion: </strong><span>{{ $empleado->fondo_pension }}</span></p>
                    <p><strong>Salario: </strong><span>{{ $empleado->salario }}</span></p>
                    <p><strong>Rol: </strong><span>{{ $empleado->rol->tipo_rol }}</span></p>
                    <p><strong>Email: </strong><span>{{ $empleado->email }}</span></p>
                    <p><strong>Fecha de nacimiento: </strong><span>{{ $empleado->fecha_nacimiento }}</span></p>
                    <p><strong>Fecha de Ingreso: </strong><span>{{ $empleado->fecha_ingreso }}</span></p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-outline btn-xs">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
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