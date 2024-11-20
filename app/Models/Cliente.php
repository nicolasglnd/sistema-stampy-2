<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClientesFactory> */
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'id',
        'entidad',
        'debe',
        'credito_contable',
        'email_entidad',
        'email_responsable',
        'telefono_responsable'
    ];

    public function persona() {
        return $this->belongsTo(Persona::class, 'id');
    }

}
