var pedido;
var categorias=new Object();
var productos=new Object();
var desayunos=new Object();
var personalizados = new Array();

var seleccionado = "b0";
var opcionesDesayunos=[];
var precio=0;
var predefinidos=new Object();

var capas = [];
var escenario;

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
function obtenerDesayunosPersonalizados(){
	$.ajax({
		url:"/personalizados/all",
		context: document.body,
		success:function(data){
			pedido = data;
			ordenarPersonalizados(data);
		}
	});
};
function obtenerProductosDesayunosPersonalizados(){
	$.ajax({
		url:"/perteneces/all",
		context: document.body,
		success:function(data){
			pedido = data;
			ordenarDesayunosPersonalizados(data);
		}
	});
};

$(function(){
	mostrar();
	
});

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
		data[i].id=categoriaOBJ.length;
		categoriaOBJ[categoriaOBJ.length]=data[i];


	}
	crearTablaProductoContenido();
	obtenerDesayunosPersonalizados();
	cargar();
	//console.log("termine");
}


function ordenarPersonalizados(data){
	for (i = 0; i < data.length; ++i) {
		var desayunoPersonalizado=data[i];
		var modelos = document.getElementById("modelos");
		var but = document.createElement("button");
		personalizados[desayunoPersonalizado.nombre]=desayunoPersonalizado.id;
		but.innerHTML=desayunoPersonalizado.nombre;
		but.setAttribute("type","button");
		but.setAttribute("id","b"+desayunoPersonalizado.id);
		but.className="DP btn btn-default col-xs-6 col-sm-3 col-md-3 botonesBarra sizeLetra";
		but.setAttribute("onclick", "configurarTipoDesayuno(event)");
		modelos.appendChild(but);

	}
	obtenerProductosDesayunosPersonalizados();

}
function ordenarDesayunosPersonalizados(data){
	for (i = 0; i < data.length; ++i) {
		//cada data va a tener idDes, idCat e idProd
		var idDesayuno = data[i].idDesayuno;
		var idCategoria=data[i].idCategoria;
		var arregloProductosIds;
		var arregloCategorias;

		

		if (predefinidos.hasOwnProperty(idDesayuno)){
			arregloCategorias=predefinidos[idDesayuno];
		}
		else{
			arregloCategorias = new Array();
			predefinidos[idDesayuno]=arregloCategorias;
		}

		if(arregloCategorias.hasOwnProperty(idCategoria)){/// ver si no se cae
			arregloProductosIds=arregloCategorias[idCategoria];
		}else{
			arregloProductosIds=new Array();
			arregloCategorias[idCategoria]=arregloProductosIds;
		}



		arregloProductosIds[arregloProductosIds.length]=data[i].idProductos;

	}
	crearPredefinidos();

}


function iniciar(){

	
	$( window ).resize(function() {
			resizeCanvas();//console.log( "me cambiaron el tamañooooo" );	
	});
}

function resizeCanvas(){
	eliminarDibujos();
	var n = document.getElementById("miCanvas").offsetWidth;	
	escenario.setWidth(n); 		
	escenario.setHeight(n);
//	mostrarPredefinido(seleccionado,false);	

}


function KineticCanvas(n){
	 	escenario = new Kinetic.Stage({
        container: 'miCanvas',
  		width: n,
        height: n,

    });
}
	

function cargar(){

	var desayunoPersonalizado=[];	
	var text = localStorage.getItem("personalizado");
	if (text==null){
		for (var i in productos){
			var opcion = productos[i];	
			var arreglo=new Array();
			for (var j=0;j<opcion.length;j++){
				arreglo[j]=false;
			}
			desayunoPersonalizado[i]=arreglo;
		}
		opcionesDesayunos["b0"]=desayunoPersonalizado;
	}
	
	else
	{
		var obj = JSON.parse(text);
		opcionesDesayunos["b0"]=obj;
		

	}
	//crearPredefinidos();
	

}



function crearPredefinidos(){ //para tener los desayunos por separado, 
							// y saber que producto contiene y cual no (arreglo de booleanos)
	for (var i in predefinidos){ // 1
	 	var desayun=crearDesayunoVacio();
	 	var desayunoPredefinido = predefinidos[i];

	 	for(var j in desayunoPredefinido){ // 1
	 		var categ=desayunoPredefinido[j];
	 		var catdes=desayun[j]; 
	 		for( var k=0 ; k<categ.length;k++){
	 			catdes[categ[k]]=true;
	 		}
	 	}

	 	opcionesDesayunos["b"+( parseInt(i))]=desayun;
	}

}




function prepararCanvas(N){
	eliminarDibujos();
	limpiarInputs();
	mostrarPredefinido(N,true);
	calcularPrecio();
} 

function mostrarPredefinido(N,setearceldas){
	//N es la posicion en opcionesDesayunos del desayuno que quiero mostrar
	var amostrar=opcionesDesayunos[N];
 	for(var j in amostrar){
 		var categoria=amostrar[j]; 
		var cat = productos[j];  ///QUE TENEMOS EN VEZ DE OPCIONES TOTALESSSSSSSSSSSSS??????????????????????????????????????????????????????????????????????????
 										//tenemos productos--> arreglo de categorias, c/u con un arreglo de prods
 		for (var i = 0; i <categoria.length ; i++) {
 			if (categoria[i]){
 				var elemento = cat[i];
				setearDibujo(elemento.imagen,elemento.nombre,elemento.x,elemento.y, elemento.w, elemento.h, categorias[elemento.idCategoria].pintarAlFondo);
				if (setearceldas) 
					setearCeldas(j-1,elemento.id);
 			}
 		}
 	}
		


}
function configurarTipoDesayuno(event){
	var target=event.target;
	console.log(target.id);
	$('.DP').removeClass("active");
	seleccionado = target.id;
	prepararCanvas(target.id);
	$("#"+target.id).addClass("active");


}
function setearCeldas(idTabla,idElem){
	var todasLasTablas = $(".table");
	tabla=todasLasTablas[idTabla]; 
	var Nrofila=Math.floor(idElem/3);
	var fila = tabla.childNodes[Nrofila+1];
	var input = fila.childNodes[idElem%3].childNodes[1];
	//input.click();
	actualizarEstado(input,true);
}
function limpiarInputs(){
	$("input").prop('checked', false);
}



function mostrar(){
	$("#comprar").click(comprar);
	$("#guardar").click(guardar);
	$("#cargar").click(recuperar);
	$("#borrar").click(borrarCanvas);
	$("#b0").click(configurarTipoDesayuno);
	//console.log("lasdads");
	
	var n = document.getElementById("miCanvas").offsetWidth;
  	KineticCanvas(n);
  	
	// var text = localStorage.getItem("personalizado");
	// if (text!=null){
	// 	prepararCanvas("b0");
	// }
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
					celda.setAttribute("onclick", "pintarCanvas(event)");
					celda.setAttribute("id", opciones2[k].id);
					input=document.createElement("INPUT");
					var permitirMasDeUnElemento=categorias[opciones2[k].idCategoria].permitirMasDeUnElemento;
					if(permitirMasDeUnElemento){
					 	input.setAttribute("type", "checkbox");
					}else{
						input.setAttribute("type", "radio");
						var nombreC=categorias[opciones2[k].idCategoria].nombre;
						input.setAttribute("name", nombreC);
					}

					celda.appendChild(imagen);
					celda.appendChild(input);
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
 
function pintarCanvas(event){
	
	opcionesDesayunos["b0"]=crearDesayuno(seleccionado);
	
	// localStorage.removeItem("personalizado");
	// var myJSON = JSON.stringify(desayunoPersonalizado);
	// localStorage.setItem("personalizado",myJSON);
	seleccionado="b0";
	$(".DP").removeClass("active");
	$("#"+seleccionado).addClass("active");

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

	while(check.tagName!="INPUT"){
		check=check.nextSibling;
	}
	var tablaElegida=productos[idTabla];
	var index = 0;
	while (id != tablaElegida[index].id)
	{
		index++;
	}
	var elemento=tablaElegida[index];
	var desayunoPersonalizado=opcionesDesayunos["b0"];
	var categoria=desayunoPersonalizado[idTabla];
	if(categoria[id]==true){
		categoria[id]=false;
		quitarDibujo(elemento.nombre);

	}else{
		//document.getElementById("miCanvas").innerHTML=elemento.imagen;
		setearDibujo(elemento.imagen,elemento.nombre, elemento.x, elemento.y, elemento.w, elemento.h,categorias[idTabla].pintarAlFondo);
		categoria[id]=true;

		if(!categorias[idTabla].permitirMasDeUnElemento){
			for(var i=0; i<tablaElegida.length; i++){
				if(i!=id && categoria[i]==true){
					categoria[i]=false;
					quitarDibujo(tablaElegida[i].nombre);
				}
			}
		}
	}
	actualizarEstado(check,categoria[id]);
	calcularPrecio();
}


function actualizarEstado(check,seleccionado){
	if(!seleccionado)
		check.checked=false;
	else
		check.checked=true;
	
}



function setearDibujo(source,nombre,equis,ygriega, w, h,pintarFondo){
	var nuevaCapa = new Kinetic.Layer({id:nombre});
	capas[nombre]=nuevaCapa;
	var imagen = new Image();
	var wcanvas=document.getElementById("miCanvas").offsetWidth;
	var hcanvas=document.getElementById("miCanvas").offsetHeight;
    imagen.src = source;
 	var imgFondo = new Kinetic.Image({
        image: imagen,
        draggable: true,
        width: w*wcanvas,
        x: equis*wcanvas-(w*wcanvas)/2, 
        y: ygriega*hcanvas-(h*hcanvas)/2,
        height: h*hcanvas
    });
 	nuevaCapa.add(imgFondo);
    escenario.add(nuevaCapa);
    if (pintarFondo)
    	nuevaCapa.moveToBottom() ;
    escenario.draw();
}

function quitarDibujo(nombre){
	var layers = escenario.getLayers();
	var capa;
	var i=0;
	var corta=false;
	while (i<layers.length && !corta){
		if (layers[i].attrs.id==nombre)
			{capa = layers[i];
			corta=true;}
		i++;
	}

	capa.removeChildren();
	capa.remove();
	escenario.draw();

}
function borrarCanvas(){
	eliminarDibujos();
	seleccionado="b0";
	opcionesDesayunos[seleccionado]=crearDesayunoVacio();
	$("#precio").text("$0.00");
	limpiarInputs();
	$(".DP").removeClass("active");
	// var DP = document.getElementsByClassName("DP");
	// DP.removeAttribute("class");

	$("#"+seleccionado).addClass("active");

}

function eliminarDibujos(){
	if (escenario.getChildren().length != 0)
		escenario.removeChildren();
}
function calcularPrecio(){
	precio = 0;
	var des = opcionesDesayunos[seleccionado];
	for (var i in des){
		var op = des[i];
		for (var j = 0; j <op.length; j++) {
			if (op[j]){
				var categoria= productos[i];
				precio+=categoria[j].precio;
			}
		}
	}
	$("#precio").text("Total $"+precio.toFixed(2));
}


function crearDesayunoVacio() {
    var Des = [];
    for (var i in productos) { 
		var opcion = productos[i];	 //categoria
		var arreglo=new Array();
		for (var j=0;j<opcion.length;j++){
			arreglo[j]=false;
		}
		Des[i]=arreglo;
	}
	return Des;

}
function crearDesayuno(bn) {
    var Des = [];
    var opDesa=opcionesDesayunos[bn];
    for (var i in opDesa ) {
		var opcion = opDesa[i];	
		var arreglo=new Array();
		for (var j=0;j<opcion.length;j++){
			arreglo[j]=opcion[j] ;
		}
		Des[i]=arreglo;
	}
	return Des;

}
function comprar(){
	var  midesayuno, i, j, micateg, catOpTo, nombre, preciop;
	var dialogo, fila, tabla, cnombre, cprecio;
	var producto, precioProducto;

	dialogo=document.createElement("DIV");
	dialogo.setAttribute("class", "cartel");
	dialogo.setAttribute("id", "facebox");
	dialogo.setAttribute("title", "Tu compra..");

	midesayuno=opcionesDesayunos[seleccionado];

	tabla=document.createElement("TABLE");
	fila=document.createElement("TR");
	producto=document.createElement("TD");
	precioProducto=document.createElement("TD");
	producto.innerHTML="Producto";
	precioProducto.innerHTML="Precio";
	fila.appendChild(producto);
	fila.appendChild(precioProducto);
	tabla.appendChild(fila);


	for(i=0; i<midesayuno.length; i++){
		micateg=midesayuno[i];
		catOpTo=opcionesTotales[i];
		for(j=0; j<micateg.length; j++){
			if(micateg[j]){
				nombre=catOpTo[j].nombre;
				preciop=catOpTo[j].precioPorUnidad;
			//	console.log("Nombre: "+nombre+" Precio: "+preciop+"...");
				fila=document.createElement("TR");
				cnombre=document.createElement("TD");
				cprecio=document.createElement("TD");
				cnombre.innerHTML=nombre;
				cprecio.innerHTML="$ "+preciop;
				fila.appendChild(cnombre);
				fila.appendChild(cprecio);
				tabla.appendChild(fila);
			}
		}

	}
	fila=document.createElement("TR");
	precioTotal=document.createElement("TD");
	precioTotal.innerHTML="precio total = $";
	precioCelda=document.createElement("TD");
	precioCelda.innerHTML=precio;
	fila.appendChild(precioTotal);
	fila.appendChild(precioCelda);
	tabla.appendChild(fila);


	dialogo.appendChild(tabla);
	document.body.appendChild(dialogo);
	
	jQuery.facebox({div:'#facebox'});
	document.body.removeChild(dialogo);
}


