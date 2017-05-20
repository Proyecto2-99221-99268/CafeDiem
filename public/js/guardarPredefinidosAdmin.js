function guardar(){
	var arregloAMandar = new Array();
	var desayunoNuevo= opcionesDesayunos[seleccionado];
	// if (seleccionado == "b0")
	// 	//nuevo desayuno
	// else
	// 	//actualizacion
	// 	//pregunto por el idDesayuno que me asigno mysql
	for (var i in desayunoNuevo){
		var categoria = desayunoNuevo[i];
		for (var j =0 ; j<categoria.length; j++){
			if (categoria[j]){
			    // var idDesayuno = ;//aca pregunto si es una actualizacion o si estoy creando uno nuevo
			    //lo saco de la barra b1 b2 b3 ... si es b0 es nuevo
			    var idCategoria= i;
			    var idProductos = j; 
			    record = new Array();
			    // record[0]=idDesayuno;
			    record[1]=idCategoria;
			    record[2]=idProductos;
			    arregloAMandar[arregloAMandar.length]=record;
			}

		}
	}
	var myJsonString = JSON.stringify(arregloAMandar);

	$.post("/perteneces",
        {name:"hola"}, function(result){
      	console.log("si");
    	}
    	);


}