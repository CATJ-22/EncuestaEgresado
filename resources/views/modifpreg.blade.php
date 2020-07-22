@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    td.details-control {
    background: url('icons/details_open.png') no-repeat center center;
    cursor: pointer;
    }
    tr.details td.details-control {
    background: url('icons/details_close.png') no-repeat center center;
    }
    .modal-dialog.modal-notify.modal-danger .modal-header {
    background-color: #ff3547;
}</style>
@endsection

@section('content')
<div class="container">

<div class="row justify-content-center"> 
  <div class="col=md=8">
      <div class="card">
          <div class="card-header" style="text-align:center;"><H4 >Preguntas de la encuesta de egresados</H4></div>

          <div class="container">
              <table class="table" id="dtpreguntas">
                  <thead>
                      <th width="5px">ID</th>
                      <th width="700px">PREGUNTA</th>
                      <th Style="text-align: center;">DETALLES</th>
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

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading"><h4 style="color: #ffff">Ventana de Confirmacion</h4></p>
      </div>

      <!--Body-->
      <div class="modal-body">
        <input type="hidden" id="idpreg">
        <p><strong>Una vez borrada la informacion, no podra recuperarse; Desea continuar?</strong></p>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center justify-content-center">
        <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><strong>No</strong></a>
        <button  id="btneliminar" onClick="eliminaryes(idpreg)" class="btn  btn-outline-danger" ><strong>Sí</strong></button>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->

</div>
@endsection

@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript"> 
function format ( d) {
   var a1="";
                if (d.tipo_preg === "A"){
                    a1="Abierta";
                } else if (d.tipo_preg === "CR"){
                    a1="Cerrada"; 
                } else{
                    a1="Seleccion Multiple";
                }   
                
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                '<td>'+'<p><strong>Tipo de Pregunta: </strong>'+a1+'</p>'+'<td>'+
                '</tr>'+
            '</table>'; 
}
</script>

<script>
    $(document).ready( function () {
        eliminaryes();

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
                        return "<div class='col' Style='text-align: center;'><a class='btn btn-success' href='/editarpreg/"+data+"'><img src='../icons/papel.svg' style='color: #fff; width: 30px; height: 30px;' alt='Modificar'></a></div>";
                }},
                {data: 'id_pregunta',
                render: function(data, t, r, meta) {
                        return "<div class='col' Style='text-align: center;'><button type='button' class='editor_remove btn btn-danger' onclick='modalcmf("+data+")'><img src='../icons/limpiar.svg' style='color: #fff; width: 30px; height: 30px;' alt='Eliminar'></button></div>";
                }},
            ],
            fixedColumns: true,
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

    function modalcmf(idpre){
        $('#idpreg').val(idpre);
        $('#modalConfirmDelete').modal({
        keyboard: false,
        backdrop: 'static'});
    }
    function eliminaryes() {
        $('#btneliminar').on('click', function() {
            e.preventDefault();
        });
        fetch('/delete/'+$('#idpreg').val(),{
            method: 'GET'
        }).then(function(d){
            console.log(d);
            $('#dtpreguntas').DataTable().ajax.reload();
        });
    }
</script>
@endsection
