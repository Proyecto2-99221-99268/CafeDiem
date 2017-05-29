modelosUsuario=new Object();
modelosUsuarioAsociativo=new Array(); //arreglo asociativo

// $(function() {
//   $.ajaxSetup({
//     headers: {
//       'X-CSRF-Token': $('meta[name="_token"]').attr('content')
//     }
//   });
// });

function recuperar () {
	$('#modelosUsuario').show();
	var usuarioID=$( "#userID" ).val();
	$.ajax({
		type: "post",
		url:"/modelosUsuario/all",
		data : {'idUsuario':usuarioID},
		success:function(data){
			ordenarModelosUsuario(data);
		}
	});
	$('#cargar').prop('disabled', true);
}
function obtenerProductosModelosUsuario(){
	var usuarioID=$( "#userID" ).val();
	var url ="/modelosUSR/all/"+ usuarioID;
	$.ajax({
		url:url,
		context: document.body,
		success:function(data){
			//alert(data);
			pedido = data;
			ModelosUsuarioProductos(data);
		}
	});
};
function ModelosUsuarioProductos(data){

	
	for (i = 0; i < data.length; ++i) {
		//cada data va a tener idDes, idCat e idProd
		var idModelos = data[i].idModelos;
		var idCategoria=data[i].idCategoria;
		var arregloProductosIds;
		var arregloCategorias;

		if (modelosUsuario.hasOwnProperty(idModelos)){
			arregloCategorias=modelosUsuario[idModelos];
		}
		else{
			arregloCategorias = new Array();
			modelosUsuario[idModelos]=arregloCategorias;
		}

		if(arregloCategorias.hasOwnProperty(idCategoria)){/// ver si no se cae
			arregloProductosIds=arregloCategorias[idCategoria];
		}else{
			arregloProductosIds=new Array();
			arregloCategorias[idCategoria]=arregloProductosIds;
		}



		arregloProductosIds[arregloProductosIds.length]=data[i].idProductos;

	}
	crearModelosUsuario();


}
function crearModelosUsuario(){ //para tener los desayunos por separado, 
							// y saber que producto contiene y cual no (arreglo de booleanos)
	for (var i in modelosUsuario){ // 1
	 	var desayun=crearDesayunoVacio();
	 	var desayunoPredefinido = modelosUsuario[i];

	 	for(var j in desayunoPredefinido){ // 1
	 		var categ=desayunoPredefinido[j];
	 		var catdes=desayun[j]; 
	 		for( var k=0 ; k<categ.length;k++){
	 			catdes[categ[k]]=true;
	 		}
	 	}

	 	opcionesDesayunos["v"+( parseInt(i))]=desayun;
	}

}

function ordenarModelosUsuario(data){
	for (i = 0; i < data.length; ++i) {
		var modeloUsuarios=data[i];
		var modelos = document.getElementById("modelosUsuario");
		var but = document.createElement("button");
		modelosUsuarioAsociativo[modeloUsuarios.nombre]=modeloUsuarios.id;
		but.innerHTML=modeloUsuarios.nombre;
		but.setAttribute("type","button");
		but.setAttribute("id","v"+modeloUsuarios.id);
		but.className="DP btn btn-default col-xs-6 col-sm-3 col-md-3 botonesBarra sizeLetra";
		but.setAttribute("onclick", "configurarTipoDesayuno(event)");
		var a = document.createElement("a");
		a.innerHTML="X";
		a.className="btn btn-danger botonEliminarModelos";
		var modid=modeloUsuarios.id;
		a.setAttribute('id',modid);
		// a.setAttribute("onclick", "confirmarBorrar(modid)");
		a.setAttribute("onclick", "confirmarBorrar(event)");
		but.appendChild(a);
		modelos.appendChild(but);

	}

	obtenerProductosModelosUsuario();
}
function confirmarBorrar(event){
	var target=event.target;
	
	var id=target.getAttribute("id");
	var r = confirm("¿Está seguro que desea eliminar el modelo?");
	// console.log(id);
    if (r == true) {
		window.location.href ="/modelosUsuario/eliminar/"+id;
    }
}

function guardar(){

	var nombreDesayuno = prompt("Ingrese el nombre del desayuno:", "");
	var id = modelosUsuarioAsociativo[nombreDesayuno];
	if (id == undefined)
		//es un desayuno nuevo tengo que guardar en personalizados
		guardarEnModelosUsuario(nombreDesayuno);
	else{

		guardarDesayuno(id);
	}
		
}

function guardarEnModelosUsuario(nombreDesayuno){
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