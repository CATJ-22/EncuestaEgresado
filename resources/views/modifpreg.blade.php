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
          <div class="card-header">Preguntas Existentes</div>

          <div class="container">
              <table class="table" id="dtpreguntas">
                  <thead>
                      <th>ID</th>
                      <th>PREGUNTA</th>
                      <th Style="width: 120px; text-align: center;" >ACCION</th>
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
                url: 'allpreg',
                method: "GET"
            },
            columns:[
                {data: 'id_pregunta'},
                {data: 'descrip_preg'},
                {data: 'id_pregunta',
                render: function(data, t, r, meta) {
                        return "<a class='btn btn-success' href='/editarpreg'><img src='../icons/papel.svg' style='color: #fff; width: 30px; height: 30px;' alt='Modificar'></a> <button type='button' onClick='return Confirm()' class='btn btn-danger'><img src='../icons/limpiar.svg' style='color: #fff; width: 30px; height: 30px;' alt='Eliminar'></button>";
                }},
            ]
        });
    } );
</script>
<script>
	function Confirm()
    {
    	var respuesta = confirm("Are you sure?");
        if(respuesta == true)
        {
        	return true;
        }
        else
        {
        	return false;
        }
    }
</script>

@endsection
