$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});

$(function(){
	var eliminar = document.createElement("IMG");
	eliminar.setAttribute("src","/img/eliminar.png");
	eliminar.setAttribute("onClick")
	$('.DP').
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
		//es una actualizacion
	

}

function guardarEnPersonalizados(nombreDesayuno){
	 var r = confirm("¿Confirma la operación?");
    if (r == true) {
		var json = JSON.stringify(nombreDesayuno);
		$.ajax({
				      type: "post",
				      url: '/personalizados/crear',
				      data: {'nombre': nombreDesayuno},
				      success: function(id){
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
			    var idDesayuno = id;
			    var idCategoria= i;
			    var idProductos = j; 
			    var record = new Object();
			    record.idDesayuno=idDesayuno;
			    record.idCategoria=idCategoria;
			    record.idProductos=idProductos;
			    arregloAMandar[arregloAMandar.length]=record;
			 
			}

		}
	var json = JSON.stringify(arregloAMandar);
	}
			$.ajax({
			      url: '/perteneces',
			      type: "post",
			        data: {data :json},
			      success: function(data){
			        alert(data);
			        window.location.href = '/';
			      }
			});


	// desayunos::table('perteneces')->insert(arregloAMandar); //???????????????????????

	// var myJsonString = JSON.stringify(arregloAMandar);

	// $.post("/perteneces",
 //        {name:"hola"}, function(result){
 //      	console.log("si");
 //    	}
 //    	);


	// 	DB::table('users')->insert([
	// 	    ['email' => 'taylor@example.com', 'votes' => 0],
	// 	    ['email' => 'dayle@example.com', 'votes' => 0]
	// 	]);



}

function recuperar(){

	console.log("recupero");
}


