<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModPreguntas;

class ModifpregController extends Controller
{
    public function show(){
        return view('modifpreg');
    }

    public function modificar(){
        $preguntas = ModPreguntas::all();

        return view('modifpreg',[
        'preguntas' => $preguntas
        ]);
    }


        
}