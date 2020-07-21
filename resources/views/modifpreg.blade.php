@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
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
<body>
<div class="row justify-content-center"> 
  <div class="col=md=8">
      <div class="card">
          <div class="card-header" style="text-align:center;"><H4 >Preguntas de la encuesta de egresados</H4></div>

          <div class="container">
              <table class="table" id="dtpreguntas">
                  <thead>
                      <th>ID</th>
                      <th>PREGUNTA</th>
                      <th>DETALLES</th>
                      <th Style="text-align: center;" >EDITAR</th>
                      <th Style="text-align: center;" >BORRAR</th>
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
function format (d) {
   var a1="";
   var identificador=d.id_pregunta.toString();
                if (d.tipo_preg === "A") {
                    a1="Abierta";
                } else if (d.tipo_preg === "CR"){
                    a1="Cerrada"; 
                } else{
                    a1="Seleccion Multiple";
                }   
                
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
<<<<<<< HEAD
                '<td>'+'<h5>Tipo de Pregunta:</h5><p>'+a1+'</p>'+'<td>'+
=======
<<<<<<< HEAD
                    '<td>'+'<p>'+identificador+'</p>'+'<td>'+
                '@foreach($pregunts as $pregunt)'+
                '@foreach($users as $user)'+
                '@if(($user->id_pregunta) == $pregunt->id_pregunta)'+
                    '<td>'+'<p>{{$user->descrip_opcion}}</p>'+'<td>'+
                        
                '@endif'+ 
                '@if(($user->id_pregunta) != $pregunt->id_pregunta)'+
                        '@break'+
                '@endif'+        
                '@endforeach'+
                '@endforeach'+
                        '</tr>'+
=======
                '<td>'+'<p>Tipo de Pregunta:'+a1+'</p>'+'<td>'+
>>>>>>> 9cf67ee71cd5461d55a5b5a31aff63fe0a82d76f
                '</tr>'+
>>>>>>> 8819f88edb2811f653296344f29456a3c6a41397
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
                        return "<a class='btn btn-success' href='/editarpreg/"+data+"'><img src='../icons/papel.svg' style='color: #fff; width: 30px; height: 30px;' alt='Modificar'></a>";
                }},
                {data: 'id_pregunta',
                render: function(data, t, r, meta) {
                        return "<a type='button' class='editor_remove btn btn-danger' href='javascript:;' onclick='dlt("+data+");'><img src='../icons/limpiar.svg' style='color: #fff; width: 30px; height: 30px;' alt='Eliminar'></a>";
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

        $('#dtpreguntas tbody').on('click', 'a.editor_remove', function (e) {
        e.preventDefault();
            table
            .row( $(this).parents('tr'))
            .remove()
            .draw();
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
<script>

</script>
@endsection
