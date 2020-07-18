<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Preguntas extends Model
{
    protected $table = 'pregunta';
    protected $primaryKey = 'id_pregunta';
    public $timestamps = false;
    public function opciones()
    {
        return $this->hasMany('App\SEL_Modelos\E_Opciones','id_pregunta');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($pregunta) { 
             $pregunta->opciones()->delete();
        });
    }

    protected $fillable = [
        'descrip_preg','tipo_preg','id_encuesta','id_seccion'
    ];
}
