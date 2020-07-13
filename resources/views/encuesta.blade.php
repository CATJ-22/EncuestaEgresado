@include('layouts.app')

@section('content')
    <style>
        .abtn{
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #005B28;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.616),0 17px 50px 0 rgba(0, 0, 0, 0.616);
            font-family: "Pill Gothic 600mg Semibd", sans-serif;
            font-size: 20px;
            width: 230px;
            text-align: center;
        }
        #startBtn:active {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.16);
            background-color: rgba(255, 255, 255, 0.76);
        }
    </style>
    <div class="row justify-content-center">
        <a class="abtn" id="startBtn" href="modifpreg" role="button">Modificar Preguntas</a>
    </div>
@endsection
    
    

