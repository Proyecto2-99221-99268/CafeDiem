$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});

$(function(){
	$("#guardar").click(myFuncion);});

function myFuncion(){

	 var person = prompt("Ingrese el nombre del desayuno:", "");
	 
}
// 	var abc =document.getElementById("abc");
// 	var form = document.createElement("FORM");
// 	form.setAttribute("action","/personalizados");
// 	form.setAttribute("id","form");
// 	form.setAttribute("method","post");
// 	form.setAttribute("name","form");
// 	var input = document.createElement("INPUT");
// 	input.setAttribute("nombre","nombre");
// 	input.setAttribute("id","nombre");
// 	form.appendChild(input);
// 	var a =document.createElement("a");
// 	a.setAttribute("href","javascript:%20check_empty()");
// 	a.setAttribute("id","submit");
// 	a.innerHTML="Confirmar";
// 	form.appendChild(a);

// 	abc.appendChild(form);
// 	abc.style.display = 'none';
// }

function guardar(){
	//1) pregunto el nombre
	

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
				//var idDesayuno=opcionesDesayunos.length+1; //?????????????????????
			    var idDesayuno = 4;//aca pregunto si es una actualizacion o si estoy creando uno nuevo
			    //lo saco de la barra b1 b2 b3 ... si es b0 es nuevo
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


