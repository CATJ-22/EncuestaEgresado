<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModEstadoencues;

class EstadoencuesController extends Controller
{
    public function show(){
        return view('estadoencuesta');
    }
    /* Metodo para comsultar las preguntas editables */
    public function GetPreguntas(){
        $preguntas = ModEstadoencues::all();
    }

        
}