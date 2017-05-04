var pedido;
var categorias=new Object();
var productos=new Object();
var desayunos=new Object();

//ajax para pedir todos los productos
$(function(){
    $.ajax({
        url: "/productos/all",
        context: document.body,
        success: function (data) {
            pedido = data;
            ordenarProductos(data);
        }
    });
});
//ajax para pedir todos las categorias
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
	//var tabla = $("#tabla");
	for (i = 0; i < data.length; ++i) {
		var cat = data[i];
		var C = new Object();
		C.nombre=cat.nombre;
		C.id=cat.id;
        //var idCategoria = cat.id;
        console.log("categoria "+cat.nombre);
		categorias[C.id]=C;
		// var ul =document.createElement("ul");
		// ul.setAttribute("id",cat.id);
		// ul.innerHTML=cat.nombre;
		// tabla.append(ul);
  		
	}
	mostrarProductos();
}

function ordenarProductos(data){
	//por cada producto que viene en el pedido
	for (i = 0; i < data.length; ++i) {
		var catID = data[i].idCategoria;
		var categoriaOBJ;
		if (productos.hasOwnProperty(catID))
			categoriaOBJ=productos[catID];
		else{
			categoriaOBJ = new Array();
			productos[catID]=categoriaOBJ;
		}
		categoriaOBJ[categoriaOBJ.length]=data[i];

	}
	//mostrarProductos();
	//console.log("termine");
}

function mostrarProductos(){

	for (var cat in productos){
		var CategoriasArreglo = productos[cat];
		$('#contenedor').append("<h3> categoria: "+ categorias[cat].nombre+"</h3>");
		for (var i=0;i<CategoriasArreglo.length;i++){
			$('#contenedor').append("<p>"+CategoriasArreglo[i].nombre+"</p>");
		}
	}

	//----------------------------------------

	var categorias_barra=$(#categorias_barra); //CREARRR
	var tabla_contenedora=$(#categoria_contenedora); //CREAR

	for (var cat in productos){
		var CategoriasArreglo=productos[cat];
		var div=document.createElement("DIV");

		div.setAttribute("id", categorias[cat].nombre);
		div.setAttribute("class", "tab-pane fade");

		var tabla=document.createElement("TABLE");
		tabla.setAttribute("id", cat);
		tabla.setAttribute("class", "table tablilla");

		var h3=document.createElement("H3");
		h3.innerHTML=categorias[cat].nombre;
		table.appendChild(h3);

		var li=document.createElement("LI");
		var a=document.createElement("A");
		a.setAttribute("class", "navClass");
		a.setAttribute("data-toggle", "pill");
		a.setAttribute("href", "#"+categorias[cat].nombre);
		
		li.appendChild(a);
		categorias_barra.append(li);

		
	}


}