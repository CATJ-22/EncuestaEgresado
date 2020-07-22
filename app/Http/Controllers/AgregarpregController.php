<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgregarpregController extends Controller
{
    public function show(){
        return view('agregarpreg');
    }

    public function store(){
        $tipo = request()->tipo_preg;
        $preguntas = request()->validate([
            'nombre_preg' => 'required',
            'tipo_preg' => 'required',
            'id_encuesta' => 'required',
            'id_seccion' => 'required'
        ]);
        $preguntas['cod_preg'] = null;


        if ($tipo == 'A') {
            E_Preguntas::create($preguntas);
        } else if ($tipo == 'CR' || $tipo == 'CC') {
            $respuestasArray = request()->all();
            foreach ($respuestasArray as $key => $value) {
                $respuestasArray = request()->validate([
                    $key => 'required'
                ]);
            }

            E_Preguntas::create($preguntas);
            
            $respuestasArray = request()->except('_token', 'descrip_preg', 'tipo_preg', 'id_encuesta', 'id_seccion');
            foreach ($respuestasArray as $key => $value) {
                $key = 'descrip_opcion';
                $pregunta = E_Preguntas::orderBy('id_pregunta','DESC')->first();
                $array = [$key => $value];
                $array['id_pregunta'] = $pregunta->id_pregunta;
                E_Opciones::create($array);
            }
        }


        return redirect('encuesta')->with('status','Pregunta Agregada!');
    }
}
