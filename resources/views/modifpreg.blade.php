@include('layouts.app')

<div class="row justify-content-center"> 
  <div class="col=md=8">
      <div class="card">
          <div class="card-header">Dashboard</div>

          <div class="card-body">
              <table class="table" id="">
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
@section('scripts')
    <script src=//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css></script>
    <script>
        $(document).ready( function () {
         $('#myTable').DataTable();
        });
    </script>
    @endsection