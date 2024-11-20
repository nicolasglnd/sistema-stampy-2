<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    /** @use HasFactory<\Database\Factories\RolesFactory> */
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['tipo_rol'];


    public function empleados() {
        return $this->hasMany(Empleado::class, 'roles_id');
    }
}
