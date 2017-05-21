
var categorias=new Object();
var productos=new Object();
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
//ajax para pedir todos los productos
function pedirProductos(){
    $.ajax({
        url: "/productos/all",
        context: document.body,
        success: function (data) {
            pedido = data;
            ordenarProductos(data);
        }
    });
};


function mostrarcategoria(data){
	//var tabla = $("#tabla");
	for (i = 0; i < data.length; ++i) {
		var cat = data[i];
		var C = new Object();
		C.nombre=cat.nombre;
		C.id=cat.id;
		C.permitirMasDeUnElemento=cat.permitirMasDeUnElemento;
		C.pintarAlFondo=cat.pintarAlFondo;
        //var idCategoria = cat.id;
        //console.log("categoria "+cat.nombre);
		categorias[C.id]=C;
		// var ul =document.createElement("ul");
		// ul.setAttribute("id",cat.id);
		// ul.innerHTML=cat.nombre;
		// tabla.append(ul);
  		
	}
	crearTablaProductoHeader();
	pedirProductos();
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
		data[i].idBD=data[i].id;
		data[i].id=categoriaOBJ.length;
		categoriaOBJ[categoriaOBJ.length]=data[i];

	}
	crearTablaProductoContenido();
	//console.log("termine");
}



function crearTablaProductoHeader(){
	var categorias_barra=$("#categorias_barra");

	for (var cat in categorias){
		//var CategoriasArreglo=productos[cat];
		var div=document.createElement("DIV");

		div.setAttribute("id", categorias[cat].nombre);
		div.setAttribute("class", "tab-pane fade");

		var li=document.createElement("LI");
		var a=document.createElement("A");
		a.setAttribute("class", "navClass");
		a.setAttribute("data-toggle", "pill");
		a.setAttribute("href", "#"+categorias[cat].nombre);
		a.innerHTML=categorias[cat].nombre;
		
		li.appendChild(a);
		categorias_barra.append(li);
	}
	li.setAttribute("class","active");

}
function crearTablaProductoContenido(){	
	
	var tabla_contenedora=$("#categoria_contenedora");

	for (var cat in productos){
		
		var div = document.createElement("DIV");
		div.setAttribute("id",categorias[cat].nombre);
		div.setAttribute("class","tab-pane fade");
		var tabla=document.createElement("TABLE");
		tabla.setAttribute("id", cat);
		tabla.setAttribute("class", "table tablilla");

		var h3=document.createElement("H3");
		h3.innerHTML=(categorias[cat].nombre);
		tabla.appendChild(h3);
		var fila;
		var celda;
		var divPrecio;
		var k=0;
		var opciones2 = productos[cat];
		var largo=Math.ceil(opciones2.length/3);
		for(var i=0; i<largo; i++){
			fila=document.createElement("TR");
			for (var j = 0; j < 3; j++) {
				if(k<opciones2.length){
					var imagen, input;
					celda=document.createElement("TD");
					divPrecio=document.createElement("DIV");
					divPrecio.setAttribute("class","precioPorUnidad");
					divPrecio.innerHTML="$"+opciones2[k].precio.toFixed(2);
					imagen=document.createElement("IMG");
					imagen.setAttribute("src", opciones2[k].imagen);
					imagen.setAttribute("class", "imagen img-circle");
					imagen.setAttribute("alt",opciones2[k].nombre);

					celda.setAttribute("class","resaltar");
					// celda.setAttribute("onclick", "pintarCanvas(event)");
					celda.setAttribute("id", opciones2[k].id);
					btn=document.createElement("button");

					var permitirMasDeUnElemento=categorias[opciones2[k].idCategoria].permitirMasDeUnElemento;
					btn.setAttribute("class","btn btn-success");
					btn.innerHTML='Modificar';
					btn.setAttribute('onclick','modificar(event)');
					celda.appendChild(imagen);
					celda.appendChild(btn);
					celda.appendChild(divPrecio);
					fila.appendChild(celda);
					k++;
				}
			}
			tabla.appendChild(fila);


		}
		div.appendChild(tabla);
		tabla_contenedora.append(div);
	}
	div.setAttribute("class","tab-pane fade active in");

}
 
function modificar (event){
	var target=event.target;
	while(target.tagName!="TD"){
		target=target.parentNode;
	}
	var id=target.getAttribute("id");
	var check=target.firstChild;
	var T=target;
	while(T.tagName!="TABLE"){
		T=T.parentNode;
	}
	var idTabla=T.getAttribute("id");

	var tablaElegida=productos[idTabla];
	var index = 0;
	while (id != tablaElegida[index].id)
	{
		index++;
	}
	var elemento=tablaElegida[index];
    window.location='/productos/'+elemento.idBD;
    
}
