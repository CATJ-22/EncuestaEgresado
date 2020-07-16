@extends('layouts.app')

@section('content')
<button tipe='button' class='btn btn-danger' data-toggle='model' data-target='#ventanaModal'> eliminar</button>
<!--Ventana de edicion-->
<div class="modal fade " id="ventanaModal" tabindex="-1" role="dialog" arial-labelleby="tituloVentana" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-header">
            <h5 id="tituloVentana">Ventana de Comfirmacion</h5>
            <button class="close" data-dimiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-success">
            <H6><strong>Desea continuar?</strong></H6>
            </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dimiss="modal">Cancelar</button>
        <button class="btn btn-success" type="button" data-dimiss="modal">Confirmar</button>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection