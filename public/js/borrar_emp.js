var id;
$('.open-modal').on("click", function () {
    id = $(this).attr('id');
    var pregunta = $('#pregunta'+id).html();
    $(".modal-body").html('Estas seguro que quieres eliminar la pregunta: ' + pregunta);     
    $('#borrarPregunta').modal('show');
});

$('#mensaje').modal('show');
setTimeout(function(){
    $('#mensaje').modal('hide');
},2000)

$('#borrar').on('click',function(){
    window.location.href = '/menu/emp/mantenimiento/delete/'+id;
});