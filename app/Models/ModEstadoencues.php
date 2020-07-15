<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModEstadoencues extends Model
{
    protected $table = 'egresado';
    protected $primaryKey ='id_egresado';

    protected $fillable = [
        'correo'];
}
