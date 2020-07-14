<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModPreguntas;

class ModifpregController extends Controller
{
    public function show(){
        return view('modifpreg');
    }

    public function GetPreguntas(){
        $preguntas = ModPreguntas::where('id_pregunta','>',9)->get();
                
        $forDtt['data']=$preguntas;

        return response()->json($forDtt);
    }


        
}