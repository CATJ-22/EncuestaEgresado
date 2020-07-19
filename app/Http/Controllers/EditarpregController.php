<?php

namespace App\Http\Controllers;
use App\Models\ModOpciones;
use Illuminate\Http\Request;

class EditarpregController extends Controller
{
    public function show(){
        $opciones = ModOpciones::get();
    return view('editarpreg', array('preguntas'=> $opciones));
    }
        
}