<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModOpciones extends Model
{
    protected $table = 'opciones';
    protected $primaryKey = 'id_opcion';
    public $timestamps = false;

    public function pregunta()
    {
        return $this->belongsTo('App\Models\ModOpciones');
    }

    protected $fillable = [
        'descrip_opcion','id_pregunta'
    ];
}
