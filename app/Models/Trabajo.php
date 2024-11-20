<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    /** @use HasFactory<\Database\Factories\TrabajosFactory> */
    use HasFactory;

    protected $table = 'trabajos';

   protected $fillable = [
        'logotipo',
        'cantidad_colores',
        'colores',
        'tipo_pintura',
        'ubicacion_estampados',
        'tamanio',
        'cantidad_estampados',
        'cantidad_prendas',
        'tipo_prendas',
        'id_orden_trabajo'
    ];

    public function ordenTrabajo() {
        return $this->belongsTo(OrdenTrabajo::class, 'id_orden_trabajo');
    }
}
