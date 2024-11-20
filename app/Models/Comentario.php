<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    /** @use HasFactory<\Database\Factories\ComentariosFactory> */
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'mensaje',
        'id_dashboard',
        'id_usuario'
    ];

    public function dashboard() {
        return $this->belongsTo(Dashboard::class, 'id_dashboard');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
