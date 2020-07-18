<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModPreguntas;
use App\Models\ModOpciones;
class ModifpregController extends Controller
{
    public function show(){
        return view('modifpreg');
    }
    /* Metodo para comsultar las preguntas editables */
    public function GetPreguntas(){
        $preguntas = ModPreguntas::WHERE('id_encuesta','=',3)->get();
        $forDtt['data']=$preguntas;
        return response()->json($forDtt);
    }

    public function GetPreguntas2(){
        $opciones = ModOpciones::get();
        $forDtt['data']=$opciones;
        return response()->json($forDtt);
    }


        
}