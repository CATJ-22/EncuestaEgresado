@extends('layouts.app')
@section('content')
<form action="encuesta" method="post">
        @csrf 
        <div class="row">
            @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div id="renderArea" class="w-100"></div>
        </div>  
</form>
@endsection
