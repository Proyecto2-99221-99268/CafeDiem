$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});

function recuperar () {

	console.log("recuperar usuario");

}

function guardar(){

	var nombreDesayuno = prompt("Ingrese el nombre del desayuno:", "");
	var id = personalizados[nombreDesayuno];
	if (id == undefined)
		//es un desayuno nuevo tengo que guardar en personalizados
		guardarEnPersonalizados(nombreDesayuno);
	else{

		guardarDesayuno(id);
	}
		
}

function guardarEnPersonalizados(nombreDesayuno){
	var r = confirm("¿Confirma la operación?");
	var usuarioID=$( "#userID" ).val();
    if (r == true) {
		var json = JSON.stringify(nombreDesayuno);
		$.ajax({
				      type: "post",
				      url: '/modelosUsuario/crear',
				      data: {'nombre': nombreDesayuno,'idUsuario':usuarioID},
				      success: function(id){
			        	//alert(id);
			        	guardarDesayuno(id);
			      }
				});
    }
}
function guardarDesayuno(id){
	
	var arregloAMandar = new Array();
	var desayunoNuevo= opcionesDesayunos[seleccionado];
	
	for (var i in desayunoNuevo){
		var categoria = desayunoNuevo[i];
		for (var j =0 ; j<categoria.length; j++){
			if (categoria[j]){
			    var idCategoria= i;
			    var idProductos = j; 
			    var record = new Object();
			    record.idModelos=id;
			    record.idCategoria=idCategoria;
			    record.idProductos=idProductos;
			    arregloAMandar[arregloAMandar.length]=record;
			 
			}

		}
	var json = JSON.stringify(arregloAMandar);
	}
			$.ajax({
			      url: '/modelosUSR',
			      type: "post",
			        data: {data :json},
			      success: function(data){
			        alert(data);
			        window.location.href = '/';
			      }
			});

}