@include('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<body>
<div class="row justify-content-center"> 
  <div class="col=md=8">
      <div class="card">
          <div class="card-header">Dashboard</div>

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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js
"></script>
<script> 
        $(document).ready(function() {
            $('#preguntas').DataTable();
        } );
</script>
    
    
@endsection