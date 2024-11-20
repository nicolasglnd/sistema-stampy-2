@extends('layouts.app')
@section('titulo', 'Editar Empleado')

@php
    $primerNombre = $empleado->persona->primer_nombre;
    $segundoNombre = $empleado->persona->segundo_nombre;
    $primerApellido = $empleado->persona->primer_apellido;
    $segundoApellido = $empleado->persona->segundo_apellido;
    $nombreCompleto = $primerNombre . " " . $segundoNombre . " " . $primerApellido . " " . $segundoApellido;
@endphp

@section('cabecera', 'Editar Empleado ' . $nombreCompleto)

@section('contenido')

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-control">
	                    <label class="label" for="primer_nombre">
	                        <span class="label-text">Primer Nombre</span>
	                    </label>
	                    <input type="text" name="primer_nombre" placeholder="Primer Nombre" maxlength="100" class="input input-bordered" value="{{ $empleado->persona->primer_nombre }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="segundo_nombre">
	                        <span class="label-text">Segundo Nombre</span>
	                    </label>
	                    <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" maxlength="100" class="input input-bordered" value="{{ $empleado->persona->segundo_nombre }}" />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="primer_apellido">
	                        <span class="label-text">Primer Apellido</span>
	                    </label>
	                    <input type="text" name="primer_apellido" placeholder="Primer Apellido" maxlength="100" class="input input-bordered" value="{{ $empleado->persona->primer_apellido }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="segundo_apellido">
	                        <span class="label-text">Segundo Apellido</span>
	                    </label>
	                    <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" maxlength="100" class="input input-bordered" value="{{ $empleado->persona->segundo_apellido }}" />
                    </div>
                    <div class="form-control">
                        <label class="label" for="id_tipo_doc">
                            <span class="label-text">Tipo de Documento</span>
                        </label>
                        <select name="id_tipo_doc" class="input input-bordered" required>
                            <option value="" disabled selected>Selecciona un tipo</option>
                            <option value="1">Cédula de Ciudadanía</option>
                            <option value="2">Número de Identificación Tributaria</option>
                            <option value="3">Cédula de Extranjería</option>
                            <option value="4">Registro Civil</option>
                            <option value="5">Licencia de Conducción</option>
                        </select>
                    </div>
                    <div class="form-control">
	                    <label class="label" for="documento_id">
	                        <span class="label-text">Documento de Identificación</span>
	                    </label>
	                    <input type="text" name="documento_id" placeholder="Documento de Identificación" maxlength="100" class="input input-bordered" value="{{ $empleado->persona->documento_id }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="telefono_1">
	                        <span class="label-text">Telefono 1</span>
	                    </label>
	                    <input type="number" name="telefono_1" placeholder="Telefono 1" maxlength="100" class="input input-bordered" value="{{ $empleado->persona->telefono_1 }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="telefono_2">
	                        <span class="label-text">Telefono 2</span>
	                    </label>
	                    <input type="number" name="telefono_2" placeholder="Telefono 2" maxlength="100" class="input input-bordered" value="{{ $empleado->persona->telefono_2 }}" />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="direccion">
	                        <span class="label-text">Dirección</span>
	                    </label>
	                    <input type="text" name="direccion" placeholder="Dirección" maxlength="100" class="input input-bordered" value="{{ $empleado->persona->direccion }}" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="id_rol">
                            <span class="label-text">Rol</span>
                        </label>
                        <select name="id_rol" class="input input-bordered" required>
                            <option value="" disabled selected>Selecciona un rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Estampador</option>
                            <option value="3">Diseñador Grafico</option>
                            <option value="4">Vendedor</option>
                        </select>
                    </div>
                    <div class="form-control">
	                    <label class="label" for="email">
	                        <span class="label-text">Correo Electronico</span>
	                    </label>
	                    <input type="text" name="email" placeholder="Correo Electronico" maxlength="100" class="input input-bordered" value="{{ $empleado->email }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="logro_academico">
	                        <span class="label-text">Logro Academico</span>
	                    </label>
	                    <input type="text" name="logro_academico" placeholder="Logro Academico" maxlength="100" class="input input-bordered" value="{{ $empleado->logro_academico }}" />
                    </div>
                    <div class="form-control">
                        <label class="label" for="activo">
                            <span class="label-text">¿El empleado esta activo?</span>
                        </label>
                        <select name="activo" class="input input-bordered" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-control">
	                    <label class="label" for="salario">
	                        <span class="label-text">Salario</span>
	                    </label>
	                    <input type="number" name="salario" placeholder="Salario" maxlength="100" class="input input-bordered" value="{{ $empleado->salario }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="eps">
	                        <span class="label-text">EPS</span>
	                    </label>
	                    <input type="text" name="eps" placeholder="EPS" maxlength="100" class="input input-bordered" value="{{ $empleado->eps }}" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="arl">
                            <span class="label-text">ARL</span>
                        </label>
                        <input type="text" name="arl" placeholder="ARL" maxlength="255" class="input input-bordered" value="{{ $empleado->arl }}" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="caja_compensacion">
                            <span class="label-text">Caja de Compensación</span>
                        </label>
                        <input type="text" name="caja_compensacion" placeholder="Caja de Compensación" maxlength="255" class="input input-bordered" value="{{ $empleado->caja_compensacion }}" />
                    </div>
                    <div class="form-control">
                        <label class="label" for="fondo_pension">
                            <span class="label-text">Fondo de Pensión</span>
                        </label>
                        <input type="text" name="fondo_pension" placeholder="Fondo de Pensión" maxlength="255" class="input input-bordered" value="{{ $empleado->fondo_pension }}" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="fecha_nacimiento">
                            <span class="label-text">Fecha de Nacimiento</span>
                        </label>
                        <input type="text" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" maxlength="255" class="input input-bordered" value="{{ $empleado->fecha_nacimiento }}" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="fecha_ingreso">
                            <span class="label-text">Fecha de Ingreso</span>
                        </label>
                        <input type="text" name="fecha_ingreso" placeholder="Fecha de Ingreso" maxlength="255" class="input input-bordered" value="{{ $empleado->fecha_ingreso }}" required />
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Actualizar Empleado</button>
                        <a href="{{ route('empleados.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection