<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    /** @use HasFactory<\Database\Factories\DashboardFactory> */
    use HasFactory;

    protected $table = 'dashboards';

    protected $fillable = [
        'id',
        'recibido',
        'dibujado',
        'estampado',
        'cobrado_entregado',
        'id_cliente'
    ];

    public function ordenTrabajo() {
        return $this->belongsTo(OrdenTrabajo::class, 'id');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
