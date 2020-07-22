<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModPreguntas;
use App\Models\ModOpciones;
use DB;
class ModifpregController extends Controller
{
    public function show(){
        $users = DB::select('call T_resp');
        /*$pregunts = ModPreguntas::WHERE('id_encuesta','=',3)->get();*/
        
        return view('modifpreg', ['users'=> $users]);
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
/* Metodo para Actualizar las preguntas*/
    public function Updatepregunt($idpreg){
        $tipo = request()->tipo_preg;
        $preguntas = request()->validate([
            'descrip_preg' => 'required',
            'tipo_preg' => 'required',
            'id_encuesta' => 'required',
            'id_seccion' => 'required'
        ]);

        $tipopregunta = ModPreguntas::where('id_pregunta', $idpreg)->first();

        if ($tipo == $tipopregunta->tipo_preg) {
            if ($tipo == 'A')
                ModPreguntas::where('id_pregunta', $idpreg)->update($preguntas);
            else if ($tipo == 'CC' || $tipo == 'CR') {
                $respuestasArray = request()->all();
                foreach ($respuestasArray as $key => $value) {
                    $respuestasArray = request()->validate([
                        $key => 'required'
                    ]);
                }

                ModPreguntas::where('id_pregunta', $idpreg)->update($preguntas);
                $respuestasArray = request()->except('_token','_method', 'descrip_preg', 'tipo_preg','id_encuesta','id_seccion');

                ModOpciones::where('id_pregunta',$idpreg)->delete();
                foreach ($respuestasArray as $key => $value) {
                    $key = 'descrip_opcion';
                    $array = [$key => $value];
                        $pregunta = ModPreguntas::where('id_pregunta',$idpreg)->first();
                        $array = [$key => $value];
                        $array['id_pregunta'] = $pregunta->id_pregunta;
                        ModOpciones::create($array);
                    }
            }
            
        }else if ($tipo != $tipopregunta->id_preg) {
        
            if ($tipo == 'A'){
                ModPreguntas::where('id_pregunta',$idpreg)->update($preguntas);
                ModOpciones::where('id_pregunta',$idpreg)->delete();

            } else if ($tipo == 'CC' || $tipo == 'CR'){
                $respuestasArray = request()->all();
                foreach ($respuestasArray as $key => $value) {
                    $respuestasArray = request()->validate([
                        $key => 'required'
                    ]);
                }

                ModPreguntas::where('id_pregunta',$idpreg)->update($preguntas);

                $respuestasArray = request()->except('_token','_method', 'descrip_preg', 'tipo_preg','id_encuesta','id_seccion');
                
                ModOpciones::where('id_pregunta',$id)->delete();
                foreach ($respuestasArray as $key => $value) {
                    $key = 'descrip_opcion';
                    $pregunta = ModPreguntas::where('id_pregunta',$idpreg)->first();
                    $array = [$key => $value];
                    $array['id_pregunta'] = $pregunta->id_pregunta;
                    ModOpciones::create($array);
                }
            }
        }


        return redirect('/editarpreg')->with('status','Actualizado Correctamente!');
    }

        public function delete($d){
            $id_pregunta->destroy($d);
            
            if($id_pregunta = ModPreguntas::find($d) == null){
                return response()->json(1);
            }
            return response()->json(0) ;        
        }
    }  

    
