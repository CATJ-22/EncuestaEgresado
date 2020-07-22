window.addEventListener('load',tipoPreg());

function tipoPreg(){
    var select = document.getElementById('tipo_preg');
    var respuesta = document.getElementById('form_respuesta');
    var button = document.getElementById('agregarResp');
    var selected = select.options[select.selectedIndex].value;
    if (selected=="Libre"){
        respuesta.style.display="none";
        button.style.display="none";
    }
    else {
        respuesta.style.display = "block";
        button.style.display = "inline-block";
    }
}

function addResp(){
    var respuestas = document.getElementById('respuestas');
    var childs = document.getElementById('respuestas').childElementCount;
    var text = document.createElement('div');
    text.classList.add('form-group','row');
    text.innerHTML = `<div class="col-sm-12 d-flex">
                    <input name=descrip_opcion_`+childs+` id=descrip_opcion_`+childs+` class="form-control mr-3">
                    <button type="button" class="btn btn-danger" id=`+childs+` onclick="borrar(this.id)">x<i class="fas fa-lg fa-trash-alt"></i></button>
                    </div>`

    respuestas.appendChild(text);
}

