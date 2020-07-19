
<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                        
                        '<tr>'+
                        '@if('+d.tipo_preg == "CR"+')'+
                        '<td>Tipo de Pregunta= Cerrada'+d.tipo_preg+' </td>'+
                        '@elseif('+d.tipo_preg == "A"+')'+
                        '<td>Tipo de Pregunta= Abierta </td>'+
                        '@else'+
                        '<td>Tipo de Pregunta= Seleccion Multiple </td>'+
                        '@endif'+
                        '</tr>'+
                    
'</table>'