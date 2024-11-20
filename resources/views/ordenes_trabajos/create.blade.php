@extends('layouts.app')

@section('titulo', 'Crear Insumo')
@section('cabecera', 'Crear Insumo')

@section('contenido') 

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="{{ route('ordenestrabajos.store') }}" method="POST">
                    @csrf
                    <div id="form-orden">
                        <div class="form-control">
                            <label class="label" for="total_cantidad_estampados">
                                <span class="label-text">Cantidad total de estampados</span>
                            </label>
                            <input type="number" name="total_cantidad_estampados" placeholder="Total estampados" class="input input-bordered" required />
                        </div>
                        <div class="form-control">
                            <label class="label" for="total_cantidad_prendas">
                                <span class="label-text">Cantidad total de prendas</span>
                            </label>
                            <input type="number" name="total_cantidad_prendas" placeholder="Total de prendas" class="input input-bordered" required />
                        </div>
                        <div class="form-control">
                            <label class="label" for="descripcion">
                                <span class="label-text">Descripción</span>
                            </label>
                            <input type="text" name="descripcion" placeholder="Escriba una descripcion" maxlength="255" class="input input-bordered" />
                        </div>
                    </div>
                    <div id="form-trabajos">
                        <div class="trabajo">
                            <div class="form-control">
                                <label class="label" for="logotipo">
                                    <span class="label-text">Logotipo</span>
                                </label>
                                <input type="text" name="logotipo" placeholder="Escriba el logotipo" maxlength="255" class="input input-bordered" />
                            </div>
                            <div class="form-control">
                                <label class="label" for="logotipo">
                                    <span class="label-text">Logotipo</span>
                                </label>
                                <input type="text" name="logotipo" placeholder="Escriba el logotipo" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="cantidad_colores">
                                    <span class="label-text">Cantidas de colores</span>
                                </label>
                                <input type="number" name="cantidad_colores" placeholder="cantida de colores" maxlength="255" class="input input-bordered" />
                            </div>
                            <div class="form-control">
                                <label class="label" for="colores">
                                    <span class="label-text">Colores (separelos con una coma (,))</span>
                                </label>
                                <input type="text" name="colores" placeholder="Escriba los colores " maxlength="255" class="input input-bordered" />
                            </div>
                            <div class="form-control">
                                <label class="label" for="tipo_pintura">
                                    <span class="label-text">Tipo de pintura</span>
                                </label>
                                <input type="text" name="tipo_pintura" placeholder="Escriba el tipo de pintura" maxlength="255" class="input input-bordered" />
                            </div>
                            <div class="form-control">
                                <label class="label" for="ubicacion_estampados">
                                    <span class="label-text">Ubicación de estampados</span>
                                </label>
                                <input type="text" name="ubicacion_estampados" placeholder="Escriba la ubicación" maxlength="255" class="input input-bordered" />
                            </div>
                            <div class="form-control">
                                <label class="label" for="cantidad_estampados">
                                    <span class="label-text">Cantidad de estampados</span>
                                </label>
                                <input type="number" name="cantidad_estampados" placeholder="Escriba la cantidad" maxlength="255" class="input input-bordered" />
                            </div>
                            <div class="form-control">
                                <label class="label" for="cantidad_prendas">
                                    <span class="label-text">Cantidad de prendas</span>
                                </label>
                                <input type="number" name="cantidad_prendas" placeholder="Escriba la cantidad" maxlength="255" class="input input-bordered" />
                            </div>
                            <div class="form-control">
                                <label class="label" for="tipo_prendas">
                                    <span class="label-text">Tipo de prendas</span>
                                </label>
                                <input type="text" name="tipo_prendas" placeholder="Escriba el tipo de prendas" maxlength="255" class="input input-bordered" />
                            </div>
                        </div>
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary" id="add-trabajo">Añadir trabajo</button>
                        <button class="btn btn-primary">Crear Orden de trabajo</button>
                        <a href="{{ route('ordenestrabajos.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script>
    const trabajoCampos = [
        {for:"logotipo", span:'Logotipo', },
        'Cantidad de colores',
        'Colores',
        'Tipo de pintura',
        'Tamaño',
        'Cantidad de estampados',
        'Cantidad de prendas',
        'Tipo de prendas'
    ];

    let trabajoIndex = 1;
    document.getElementById('add-trabajo').addEventListener('click', () => {
        const trabajosDiv = document.querySelector("#form-trabajos");
        const nuevoTrabajoDiv = document.createElement('div');
        nuevoTrabajoDiv.classList.add('trabajo');

    });
</script>