@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<body>
<div class="row justify-content-center"> 
  <div class="col=md=8">
      <div class="card">
          <div class="card-header">Estado de Encuesta</div>

          <div class="container">
              <table class="table" id="dtpreguntas">
                  <thead>
                    <th>ID</th>  
                    <th>Correo Electronico</th>
                      <th>Estado</th>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
</body>

@endsection

@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script> 
    $(document).ready( function () {
        $('#dtpreguntas').DataTable({ 
            ajax:{
                url: 'allest',
                method: "GET"
            },
            columns:[
                {data: 'id_egresado'},
                {data: 'correo'},
                {data: 'Estado'},
            ],
            //Funcion para colorear la celda dependiendo del estado
            rowCallback:function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
                if(aData.Estado == "Respondida"){
                    $($(nRow).find("td")[2]).css("background-color","#3D9606");
                    $($(nRow).find("td")[2]).css('color', '#FFF');
                    $($(nRow).find("td")[2]).css('text-align', 'center');
                }else{
                    $($(nRow).find("td")[2]).css("background-color","#AF081C");
                    $($(nRow).find("td")[2]).css('color', '#FFF');
                    $($(nRow).find("td")[2]).css('text-align', 'center');
                }

            }
        });
    } );
</script>
@endsection