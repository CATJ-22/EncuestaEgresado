<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModPreguntas extends Model
{
    protected $table = 'pregunta';
    protected $primaryKey ='id_pregunta';
    public $timestamps = false;

    protected $fillable = [
        'descrip_preg','cod_preg', 'tipo_preg', 'id_encuesta','id_seccion'
    ];
}
