var num_acciones;
$(function() {
    buscar_acciones();    
    buscar_rol_accion();
});

function buscar_rol_accion() {
    var rol = trae('rolaccion-id_rol').value;
    
    $("#div_accion :input").each(function(){	
        this.checked = false;
    });
    
    if (rol!="") {
        $.get('../rol-accion/buscar-accion',{rol : rol},function(data){
            var data = $.parseJSON(data);

            if (data!="") {
                for (i = 0; i < data.length; i++) {
                    trae("i_accion_"+data[i].id_accion).checked = true;
                }
            }
        });
    }
}

Array.matrix = function(numrows, numcols, initial) {
    var arr = [];
    for (var i = 0; i < numrows; ++i) {
        var columns = [];
        for (var j = 0; j < numcols; ++j) {
            columns[j] = initial;
        }
        arr[i] = columns;
    }
    return arr;
}

function buscar_acciones() {
    var div_accion = trae('div_accion');
    num_acciones=0;
    var texto;
    var titulo = "";
    var cadena;
    var y = 0;
    var x = 0;
    $.getJSON('../rol-accion/buscar-accion',{},function(data){
        if (data!="") {
            num_acciones = data.length;
            var arreglo = Array.matrix(data.length,3,"");
            for (var i = 0; i < data.length; i++) {
                texto = data[i].alias.split(" ");
                cadena = data[i].alias;
                cadena = cadena.replace(texto[texto.length - 1],'');
                texto = texto[texto.length - 1];
                
                arreglo[i][0] = data[i].id_accion;
                arreglo[i][1] = texto.trim();
                arreglo[i][2] = cadena.trim();
                if (titulo!=cadena.trim()) {
                    y++;
                    titulo=cadena.trim();
                }
                arreglo[i][3] = y;    
                
            }
            titulo="";
            y=0;
            for (var fil = 0; fil < arreglo.length; fil++) {
                if (arreglo[fil][3]!=y) {
                    y=arreglo[fil][3];
                    var div = document.createElement('div');
                    div.className = "container-fluid";
                    div.style.border = "1px solid #DADADA";
                    div.style.margin = "5px";
                    div.id="div_"+arreglo[fil][3];
                }
                
                var h4 = document.createElement('h4');
                h4.className = "col-sm-12";
                h4.style.textDecoration = "underline #000"; 
                h4.innerHTML = arreglo[fil][2];

                var div2 = document.createElement('div');
                var input = document.createElement('input');
                var b = document.createElement('b');

                div2.align="left";
                div2.id="d_accion_"+fil;
                div2.style= "width: 19%; float: left; padding: 3px";
                b.style= "padding: 3px";
                b.innerHTML = arreglo[fil][1];
                input.type = "checkbox";
                input.id = "i_accion_"+arreglo[fil][0];
                input.style.marginRight = "4px";
                div2.appendChild(input);
                div2.appendChild(b);        

                if (titulo!=arreglo[fil][2]) {
                    titulo = arreglo[fil][2];
                    div.appendChild(h4);
                    div.appendChild(div2);
                    div_accion.appendChild(div);
                } else {
                    $("#div_"+y)[0].appendChild(div2);
                }

                
            }
            /*for (var i = 0; i < data.length; i++) {
                div2[i] = document.createElement('div');
                div2[i].className = "container-fluid";
                div2[i].style.border = "1px solid #DADADA";
                var h4 = document.createElement('h4');
                var div = document.createElement('div');
                var input1 = document.createElement('input');
                var b = document.createElement('b');
                    
                texto = data[i].alias.split(" ");
                div.align="left";
                div.id="d_accion_"+i;
                div.style= "width: 19%; float: left; padding: 3px";
                b.style= "padding: 3px";
                b.innerHTML = texto[texto.length - 1];

                cadena = data[i].alias;
                cadena = cadena.replace(texto[texto.length - 1],'');
                h4.innerHTML = cadena;
                h4.className = "col-sm-12";
                
                input1.type = "checkbox";
                input1.id = "i_accion_"+data[i].id_accion;
                input1.style.marginRight = "4px";

                div.appendChild(input1);
                div.appendChild(b);
                if (titulo!=cadena) {
                    titulo = cadena;
                    div2[i].appendChild(h4);
                }
                div2[i].appendChild(div);
                div_accion.appendChild(div2[i]);
            }
            //console.log(div2);*/
        }
    });
}

function seleccionar_todos() {
    var seleccionar = trae('seleccionar');
    
    $("#div_accion :input").each(function(){	
        if (seleccionar.checked) {
            this.checked = true;
        } else {
            this.checked = false;
        }
    });
}

function enviar_data() {
    var i_items = document.getElementById('i_items');
    var rol = trae('rolaccion-id_rol').value;
    
    i_items.value = "";
    
    if (rol!="") {
        $("#div_accion :input").each(function(){	
            var campos = this.id.split("_");
            if (this.checked) {
                i_items.value+= campos[2]+"#";
            }
        });

        if (i_items.value!="") document.forms['w0'].submit();
    } else {
        alert("Faltan datos");
    }
}