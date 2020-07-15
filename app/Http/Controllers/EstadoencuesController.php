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
    /* Metodo para comsultar los correos de los egresaodos */
    public function GetCorreos(){
       /*$correos = ModEstadoencues::get();*/
       $correos= DB::select("select  * from (
        select  id_egresado, correo, 'Respondido' as 'Estado' from egresado, respuesta where egresado.id_usuario=respuesta.id_usuario
        union all 
        select  id_egresado, correo, 'Sin Responder' AS 'Estado' FROM egresado, respuesta where respuesta.id_usuario!=egresado.id_usuario
        )egresado group by id_egresado, correo, Estado");
  
       
       return view('estadoencues', array('correos' =>$correos));}


        
}