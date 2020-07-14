@extends('layouts.app')


@section('content')
    <!--Diseño del Boton-->
    <style>
        .abtn{
            position: absolute;
            top: 70%;
            left: 60%;
            transform: translate(-50%, -50%);
            color: #005B28;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.616),0 17px 50px 0 rgba(0, 0, 0, 0.616);
            font-family: "Pill Gothic 600mg Semibd", sans-serif;
            font-size: 20px;
            width: 290px;
            box-sizing: content-box;
            text-align: center;
        }
        #startBtn:active {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.16);
            background-color: rgba(189, 189, 189, 0.76);
        }
    </style>
    <!--Boton de Modificar y eliminar-->
    <div class="row justify-content-center">
        <a class="abtn" id="startBtn" href="modifpreg" role="button">Modificar o eliminar Preguntas</a>
    </div>
@endsection
    
    

