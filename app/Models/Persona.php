<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /** @use HasFactory<\Database\Factories\PersonasFactory> */
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'direccion',
        'telefono_1',
        'telefono_2',
        'id_tipo_doc',
        'documento_id'
    ];

    public function empleado() {
        return $this->hasOne(Empleado::class, 'id');
    }

    public function cliente() {
        return $this->hasOne(Cliente::class, 'id');
    }

    public function tipoDocumento() {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_doc');
    }
}
