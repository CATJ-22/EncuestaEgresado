<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModPreguntas;
use App\Models\ModOpciones;
use DB;
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

    

    public function Editarpregunt($idpreg){
        $preguntas = ModPreguntas::find($idpreg);
        $opciones = ModOpciones::where('id_pregunta', $idpreg)->get();
        return view('editarpreg', array('preguntas'=> $preguntas), array('opciones'=> $opciones));
    }

    public function Updatepregunt($idpreg){

    }  

}