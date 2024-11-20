<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadosFactory> */
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'id',
        'id_rol',
        'email',
        'logro_academico',
        'activo',
        'salario',
        'eps',
        'arl',
        'caja_compensacion',
        'fondo_pension',
        'fecha_nacimiento',
        'fecha_ingreso',
    ];

    public function persona() {
        return $this->belongsTo(Persona::class, 'id');
    }

    public function rol() {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function user() {
        return $this->hasOne(User::class, 'id');
    }
}
