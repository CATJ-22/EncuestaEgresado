@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<body>
<div class="row justify-content-center"> 
  <div class="col=md=8">
      <div class="card">
          <div class="card-header">Preguntas Existentes</div>

          <div class="container">
              <table class="table" id="preguntas">
                  <thead>
                      <th>ID</th>
                      <th>PREGUNTA</th>
                      <th>ACCION</th>
                  </thead>
                  <tbody>
                      @foreach($preguntas as $pregunta)
                      <tr>
                          <td>{{ $pregunta -> id_pregunta }}</td>
                          <td>{{ $pregunta -> descrip_preg }}</td>
                          <td></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
</body>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script> 
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection