@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
    td.details-control {
    background: url('icons/details_open.png') no-repeat center center;
    cursor: pointer;
    }
    tr.details td.details-control {
    background: url('icons/details_close.png') no-repeat center center;
    }</style>
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
                      <th>RESPUESTAS</th>
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

<script type="text/javascript"> 
function format ( d ) {
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '@if('+string(d.tipo_preg)+'== "A")'+
                        '<tr>'+
                            '<input disable type="text" class="form-control">'+
                        '</tr>'+
                '@elseif('+string(d.tipo_preg)+' == "CR")'+
                '@foreach($opciones as $key => $opcion)'+
                '@if('+d.id_pregunta+' == $opcion->id_pregunta)'+
                        '<tr>'+
                            '<td>{{$opcion->descrip_opcion}}</td>'+
                        '</tr>'+
                '@endif'+
                '@endforeach'+
                '@else'+
                '@foreach($opciones as $key => $opcion)'+
                '@if('+d.id_pregunta+' == $opcion->id_pregunta)'+
                        '<tr>'+
                            '<td>{{$opcion->descrip_opcion}}</td>'+
                        '</tr>'+
                '@endif'+
                '@endforeach'+
                '@endif'+
            '</table>';
    
}




</script>

<script>
    $(document).ready( function () {
        var dt = $('#dtpreguntas').DataTable({
            ajax:{
                url: 'allpreg',
                method: "GET",
            },
            columns:[
                {data: 'id_pregunta'},
                {data: 'descrip_preg'},
                {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
                },
                {data: 'id_pregunta',
                render: function(data, t, r, meta) {
                        return "<a class='btn btn-success' href='/editarpreg/"+data+"'><img src='../icons/papel.svg' style='color: #fff; width: 30px; height: 30px;' alt='Modificar'></a> <button type='button' onClick='return Confirm()' class='btn btn-danger'><img src='../icons/limpiar.svg' style='color: #fff; width: 30px; height: 30px;' alt='Eliminar'></button>";
                }},
            ],
            language:{
                info: "_TOTAL_ registros",
                search: "Buscar",
                paginate:{
                    next:"Siguiente",
                    previous:"Anterior"
                },
                lengthMenu: 'Mostrar <select>'+
                        '<option value="10">10</option>'+
                        '<option value="30">30</option>'+
                        '<option value="-1">Todos</option>'+
                        '</select> registros por pagina',
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                emptyTable: "No hay datos...",
                zeroRecords: "No hay coincidencias",
                infoEmpty: "",
                infoFiltered: ""
            }
            
        });

        var detailRows = [];
    
    $('#dtpreguntas tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
        
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();

            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();

            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );

    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );    

    } );
</script>

@endsection
