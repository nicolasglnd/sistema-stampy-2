@extends('layouts.app')

@section('titulo', 'Crear Cliente')
@section('cabecera', 'Crear Cliente')

@section('contenido') 

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="form-control">
	                    <label class="label" for="entidad">
	                        <span class="label-text">Entidad</span>
	                    </label>
	                    <input type="text" name="entidad" placeholder="Escribe la entidad" maxlength="100" class="input input-bordered" />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="primer_nombre">
	                        <span class="label-text">Primer Nombre</span>
	                    </label>
	                    <input type="text" name="primer_nombre" placeholder="Primer Nombre" maxlength="100" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="segundo_nombre">
	                        <span class="label-text">Segundo Nombre</span>
	                    </label>
	                    <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" maxlength="100" class="input input-bordered" />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="primer_apellido">
	                        <span class="label-text">Primer Apellido</span>
	                    </label>
	                    <input type="text" name="primer_apellido" placeholder="Primer Apellido" maxlength="100" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="segundo_apellido">
	                        <span class="label-text">Segundo Apellido</span>
	                    </label>
	                    <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" maxlength="100" class="input input-bordered" />
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
	                    <input type="text" name="documento_id" placeholder="Documento de Identificación" maxlength="100" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="telefono_1">
	                        <span class="label-text">Telefono 1</span>
	                    </label>
	                    <input type="number" name="telefono_1" placeholder="Telefono 1" maxlength="100" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="telefono_2">
	                        <span class="label-text">Telefono 2</span>
	                    </label>
	                    <input type="number" name="telefono_2" placeholder="Telefono 2" maxlength="100" class="input input-bordered" />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="direccion">
	                        <span class="label-text">Dirección</span>
	                    </label>
	                    <input type="text" name="direccion" placeholder="Dirección" maxlength="100" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="email_entidad">
	                        <span class="label-text">Correo Electronico de la Entidad</span>
	                    </label>
	                    <input type="email" name="email_entidad" placeholder="Correo Electronico" maxlength="100" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="email_responsable">
	                        <span class="label-text">Correo Electronico del responsable</span>
	                    </label>
	                    <input type="email" name="email_responsable" placeholder="Correo Electronico" maxlength="100" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
	                    <label class="label" for="telefono_responsable">
	                        <span class="label-text">Telefono Reponsable</span>
	                    </label>
	                    <input type="number" name="telefono_responsable" placeholder="Telefono Reponsable" maxlength="100" class="input input-bordered" required />
                    </div>

                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Crear Cliente</button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection