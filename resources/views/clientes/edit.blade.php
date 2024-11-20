@extends('layouts.app')
@section('titulo', 'Editar Cliente')

@php
    $primerNombre = $cliente->persona->primer_nombre;
    $segundoNombre = $cliente->persona->segundo_nombre;
    $primerApellido = $cliente->persona->primer_apellido;
    $segundoApellido = $cliente->persona->segundo_apellido;
    $nombreCompleto = $primerNombre . " " . $segundoNombre . " " . $primerApellido . " " . $segundoApellido;
    $tituloNombre = $cliente->entidad ? $cliente->entidad : $nombreCompleto;
@endphp

@section('cabecera', 'Editar Cliente ' . $tituloNombre)

@section('contenido')

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-control">
	                    <label class="label" for="entidad">
	                        <span class="label-text">Entidad</span>
	                    </label>
	                    <input type="text" name="entidad" placeholder="Entidad" maxlength="100" class="input input-bordered" value="{{ $cliente->entidad }}" />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="primer_nombre">
	                        <span class="label-text">Primer Nombre</span>
	                    </label>
	                    <input type="text" name="primer_nombre" placeholder="Primer Nombre" maxlength="100" class="input input-bordered" value="{{ $cliente->persona->primer_nombre }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="segundo_nombre">
	                        <span class="label-text">Segundo Nombre</span>
	                    </label>
	                    <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" maxlength="100" class="input input-bordered" value="{{ $cliente->persona->segundo_nombre }}" />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="primer_apellido">
	                        <span class="label-text">Primer Apellido</span>
	                    </label>
	                    <input type="text" name="primer_apellido" placeholder="Primer Apellido" maxlength="100" class="input input-bordered" value="{{ $cliente->persona->primer_apellido }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="segundo_apellido">
	                        <span class="label-text">Segundo Apellido</span>
	                    </label>
	                    <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" maxlength="100" class="input input-bordered" value="{{ $cliente->persona->segundo_apellido }}" />
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
	                    <input type="text" name="documento_id" placeholder="Documento de Identificación" maxlength="100" class="input input-bordered" value="{{ $cliente->persona->documento_id }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="telefono_1">
	                        <span class="label-text">Telefono 1</span>
	                    </label>
	                    <input type="number" name="telefono_1" placeholder="Telefono 1" maxlength="100" class="input input-bordered" value="{{ $cliente->persona->telefono_1 }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="telefono_2">
	                        <span class="label-text">Telefono 2</span>
	                    </label>
	                    <input type="number" name="telefono_2" placeholder="Telefono 2" maxlength="100" class="input input-bordered" value="{{ $cliente->persona->telefono_2 }}" />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="direccion">
	                        <span class="label-text">Dirección</span>
	                    </label>
	                    <input type="text" name="direccion" placeholder="Dirección" maxlength="100" class="input input-bordered" value="{{ $cliente->persona->direccion }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="debe">
	                        <span class="label-text">Deuda del cliente</span>
	                    </label>
	                    <input type="number" name="debe" placeholder="Debe" maxlength="100" class="input input-bordered" value="{{ $cliente->debe }}" required />
                    </div>
                    <div class="form-control">
                        <label class="label" for="credito_contable">
                            <span class="label-text">¿El cliente tiene credito contable?</span>
                        </label>
                        <select name="credito_contable" class="input input-bordered" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-control">
	                    <label class="label" for="email_entidad">
	                        <span class="label-text">Correo electronico de la entidad</span>
	                    </label>
	                    <input type="email" name="email_entidad" placeholder="Email - Entidad" maxlength="100" class="input input-bordered" value="{{ $cliente->email_entidad }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="email_responsable">
	                        <span class="label-text">Correo electronico del responsable</span>
	                    </label>
	                    <input type="email" name="email_responsable" placeholder="Email - Responsable" maxlength="100" class="input input-bordered" value="{{ $cliente->email_responsable }}" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="telefono_responsable">
	                        <span class="label-text">Telefono del responsable</span>
	                    </label>
	                    <input type="number" name="telefono_responsable" placeholder="Telefono - Responsable" maxlength="100" class="input input-bordered" value="{{ $cliente->telefono_responsable }}" required />
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Actualizar Cliente</button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection