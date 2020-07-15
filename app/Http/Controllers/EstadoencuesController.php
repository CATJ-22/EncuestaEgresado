<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModEstadoencues;
use DB;


class EstadoencuesController extends Controller
{
    public function show(){
        return view('estadoencues');
    }
    /* Metodo para comsultar estados de encuesta respondida*/
    public function GetEstados(){
       $correos = DB::select("call estadoencuesta"); 

       $forDtt['data']=$correos;

       return response()->json($forDtt);
    }
    
}