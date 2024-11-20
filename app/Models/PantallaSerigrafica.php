<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PantallaSerigrafica extends Model
{
    /** @use HasFactory<\Database\Factories\PantallasSerigraficasFactory> */
    use HasFactory;

    protected $table = 'pantallas_serigraficas';

    protected $fillable = [
        'nombre',
        'id_pantalla_fisica',
        'constancia_eliminacion',
        'ruta_dibujo',
        'ruta_imagen_original',
        'id_usuario',
        'id_orden_trabajo',
    ];

    public function ordenTrabajo() {
        return $this->belongsTo(OrdenTrabajo::class, 'id_orden_trabajo');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
