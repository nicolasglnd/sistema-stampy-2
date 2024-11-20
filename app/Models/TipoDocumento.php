<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    /** @use HasFactory<\Database\Factories\TiposDocumentosFactory> */
    use HasFactory;

    protected $table = 'tipos_documentos';

    protected $fillable = ['tipo_documento'];

    public function personas() {
        return $this->hasMany(Persona::class, 'id_tipo_doc');
    }
}
