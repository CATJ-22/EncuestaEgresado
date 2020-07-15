<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModEstadoencues;


class EstadoencuesController extends Controller
{
    public function show(){
        return view('estadoencues');
    }
    /* Metodo para comsultar los correos de los egresaodos */
    public function GetCorreos(){
       $correos = ModEstadoencues::get(['correo',
        ]);

       

       return view('estadoencues', array('correos' =>$correos));}


        
}