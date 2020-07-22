@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">Agregar Pregunta</div>

            <div class="container">
                <form action="/agregarpreg" method="POST">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <span>Todos los campos son requeridos</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group">
                        <br>
                        <label for="tipo_preg" class="form">Tipo de Pregunta</label>
                        <select class="form-control" name="tipo_preg" id="tipo_preg" onchange="tipoPreg()">
                            <option value="Libre" selected>Libre</option>
                            <option value="Cerrado">Seleccion Multiple</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="nombre_preg" class="form">Escriba su pregunta</label>
                        <input type="text" class="form-control {{ $errors->has('nombre_preg') ? ' is-invalid' : '' }}" id="nombre_preg" name="nombre_preg">
                    </div>

                    <div class="form-group" id="form_respuesta" style="display:none">
                        <label for="nombre_resp" class="form">Escriba las opciones</label>
                        <div id="respuestas">
                            <div class="row form-group">
                                <div class="col-12">
                                    <input name=nombre_resp_0 id=nombre_resp_0 class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <input name=nombre_resp_1 id=nombre_resp_1 class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="button" id="agregarResp" class="btn btn-success" onclick="addResp()">Agregar respuesta</button>
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-between mt-5 mb-5">
                        <a href="/agregarpreg" class="btn btn-success">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/pregunta.js')}}"></script>
@endsection

<!--
<a class="btn btn-success" href="#">M</a>
<button type="button" class="btn btn-danger">D</button>
-->