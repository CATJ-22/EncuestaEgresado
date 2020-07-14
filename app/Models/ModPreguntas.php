<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModPreguntas extends Model
{
    protected $table = 'pregunta';
    protected $primaryKey ='id_pregunta';

    protected $fillable = [
        'descrip_preg','cod_preg','id_encuesta','id_seccion'
    ];
}
