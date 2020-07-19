
'@if($pregunta->tipo_preg == "A")'+
  '<tr>'+
    '<input disable type="text" class="form-control">'+
 '</tr>'+
 '@elseif($pregunta->tipo_preg == "CR")'+
 '@foreach($opciones as $key $opcion)'+
  '@if($pregunta->id_pregunta == $opcion->id_pregunta)'+
        '<tr>'+
            '<td>{{$opcion->descrip_opcion}}</td>'+
        '</tr>'+
  '@endif'+
  '@endforeach'+
  '@else'+
  '@foreach($opciones as $opcion)'+
  '@if($pregunta->id_pregunta == $opcion->id_pregunta)'+
        '<tr>'+
            '<td>{{$opcion->descrip_opcion}}</td>'+
        '</tr>'+
  '@endif'+
  '@endforeach'+
  '@endif'