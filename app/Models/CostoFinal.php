<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostoFinal extends Model
{
    /** @use HasFactory<\Database\Factories\CostosFinalesFactory> */
    use HasFactory;

    protected $table = 'costos_finales';

    protected $fillable = [
        'id',
        'cantidad_dibujos',
        'costo_dibujos',
        'costo_grabados',
        'costo_estampados',
        'id_cliente',
    ];

    public function ordenTrabajo() {
        return $this->belongsTo(OrdenTrabajo::class, 'id');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
