<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /** @use HasFactory<\Database\Factories\UsuariosFactory> */
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'id',
        'nombre_usuario',
        'contrasenia'
    ];

    public function empleado() {
        return $this->belongsTo(Empleado::class, 'id');
    }
}
