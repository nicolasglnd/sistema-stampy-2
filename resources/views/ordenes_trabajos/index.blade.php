@extends('layouts.app')

@section('titulo', 'Ordenes de Trabajo')
@section('cabecera', 'Ordenes de Trabajo')

@section('contenido')

    {{-- boton crear --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('ordenestrabajos.create') }}" class="btn btn-outline">Nueva orden de trabajo</a>
    </div>

    {{-- grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-6 --}}
    <div id="index-orden" class="flex flex-wrap justify-center gap-4 m-4 ">

        @foreach($ordenes as $orden)
            <div class="card bg-primary text-primary-content w-96 shadow-x1 m-8 p-4">
                <div class="card-body">
                    @php
                        $primerNombre = $orden->cliente->persona->primer_nombre;
                        $segundoNombre = $orden->cliente->persona->segundo_nombre;
                        $primerApellido = $orden->cliente->persona->primer_apellido;
                        $segundoApellido = $orden->cliente->persona->segundo_apellido;
                        $nombreCompleto = $primerNombre . " " . $segundoNombre . " " . $primerApellido . " " . $segundoApellido;
                        $clienteNombre = $orden->cliente->entidad ? $orden->cliente->entidad : $nombreCompleto;
                    @endphp
                    <h2 class="card-title">{{ $clienteNombre }}</h2>
                    <p><strong>ID: </strong><span>{{ $orden->id }}</span></p>
                    <p><strong>Total cantidad de estampados: </strong><span>{{ $orden->total_cantidad_estampados }}</span></p>
                    <p><strong>Total cantidad de prendas: </strong><span>{{ $orden->total_cantidad_prendas }}</span></p>
                    <p><strong>Descripción: </strong><span>{{ $orden->descripcion }}</span></p>
                    <p><strong>Cliente: </strong><span>{{ $clienteNombre }}</span></p>
                    <p><strong>ID del cliente: </strong><span>{{ $orden->id_cliente }}</span></p>
                    <p><strong>Documento de Identificación: </strong><span>{{ $orden->cliente->persona->documento_id }}</span></p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('ordenestrabajos.edit', $orden->id) }}" class="btn btn-outline btn-xs">Editar</a>
                        <form action="{{ route('ordenestrabajos.destroy', $orden->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline- btn-xs">Eliminar</button>
                        </form>
                    </div>
                </div>
                <div class="card-trabajos card-body">
                    <div>
                        <input type="checkbox" id="orden-{{ $orden->id }}" class="toggle-trabajos" />
                        <label for="orden-{{ $orden->id }}">Mostrar trabajos</label>
                    </div>
                    <div class="trabajos" id="trabajos-{{ $orden->id }}" style="display: none;"></div>
                </div>
            </div>
        @endforeach

    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const trabajoCampos = [
            'ID',
            'Logotipo',
            'Cantidad de colores',
            'Colores',
            'Tipo de pintura',
            'Tamaño',
            'Cantidad de estampados',
            'Cantidad de prendas',
            'Tipo de prendas'
        ];
        const separador = document.createElement('hr');

        const toggles = document.querySelectorAll('.toggle-trabajos');

        toggles.forEach(toggle => {
            toggle.checked = false;

        });

        toggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const trabajosId = this.id.replace('orden-', 'trabajos-');
                const trabajosDiv = document.getElementById(trabajosId);

                if (this.checked) {
                    if (trabajosDiv.textContent.trim() === "") {
                        //cargar trabajos con AJAX
                        fetch(`/ordenestrabajos/${trabajosId.replace('trabajos-', '')}/trabajos`)
                            .then (response => {
                                if (!response.ok) {
                                    throw new Error('Error en la solicitud');
                                }
                                return response.json();
                            })
                            .then (data => {
                                let trabajosHtml = document.createElement('ul');
                                data.forEach(trabajo => {
                                    let trabajoItem = document.createElement('li');
                                    let i = 0;

                                    //estilos
                                    trabajoItem.classList.add('bg-blue-300', 'p-2', 'rounded-lg', 'shadow-md', 'mb-4')

                                    //loop trabajo
                                    for (let key in trabajo) {
                                        if (trabajo.hasOwnProperty(key) && trabajoCampos[i]) {
                                            let p = document.createElement('p');
                                            let strong = document.createElement('strong');
                                            let span = document.createElement('span');

                                            strong.textContent = `${trabajoCampos[i]}: `;
                                            span.textContent = trabajo[key] || "";

                                            //unir elementos
                                            p.appendChild(strong);
                                            p.appendChild(span);
                                            trabajoItem.appendChild(p);
                                            i++;
                                        }
                                    }

                                    //trabajoItem.appendChild(separador);
                                    trabajosHtml.appendChild(trabajoItem);
                                });
                                trabajosDiv.appendChild(trabajosHtml);
                            })
                            .catch (error => {
                                console.error('Error al cargar trabajos:', error);
                                trabajosDiv.textContent = 'No se pudieron cargar los trabajos';
                            });
                    }
                    trabajosDiv.style.display = 'block';
                }
                else {
                    trabajosDiv.style.display = 'none';
                }
            });
        });
    });
</script>
