var opciones = new Array;

$(function() {
    $.ajax({
        url: "/categorias/all",
        context: document.body,
        success: function (data) {
            pedido = data;
            mostrarcategoria(data);
        }
    });
});

function mostrarcategoria(data){
	var categoriaID = $("#IDCategoria");
	var idCategoria = $("#Categoria");
	for (i = 0; i < data.length; ++i) {
		var cat = data[i].nombre;
		var opcion = document.createElement("OPTION");
		opcion.innerHTML=cat;
		opcion.setAttribute("id",i);
		//opcion.setAttribute("onclick", "elegirCategoria(event)");
		idCategoria.append(opcion);
		opciones[cat]=data[i].id;
		
	}
	cambioCategoria();
}

// function elegirCategoria(event){
// 	var idc = $('#idCategoria');
// 	var target=event.target;
// 	while(target.tagName!="option"){
// 		target=target.parentNode;
// 	}
// 	var id = target.getAttribute("id");
// 	var arreglo=opciones.id;
// 	var carID = arreglo[1]; //id
// 	idc.setAttribute('value',carID);


// }
function cambioCategoria() {
	$('#bootstrapSelectForm').find('[name="Categoria"]').selectpicker().change(function(event) {
		var e = document.getElementById("Categoria");
		var valor = e.options[e.selectedIndex].value;
		console.log("valor "+valor);
		var idCategoria = document.getElementById("idCategoria");
		var c = opciones[valor];
		idCategoria.setAttribute('value',c);

	}
	)
}