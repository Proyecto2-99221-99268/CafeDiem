function guardar(){ 
	
	console.log("soy un simple mortal");
	var myJSON = localStorage.getItem("desayuno");
	localStorage.removeItem("desayuno");
	var desa = JSON.stringify(opcionesDesayunos["b0"]);
//	var desa2=desa.substring(1,5);
//	var desa3=desa.split("null");
	var desa4=desa.replace("null,", "");
//	console.log(desa4);
	localStorage.setItem("desayuno",desa4);
	console.log(localStorage.getItem("desayuno"));
	alert("Desayuno guardado!");
}

function recuperar(){


	var myJSON = localStorage.getItem("desayuno");
	if (myJSON != null){

		console.log(myJSON);

		var desayunium = JSON.parse(myJSON);
		//console.log(JSON.stringify(desayunium));	
		var recambio=new Array();

		for (var i = 0; i < desayunium.length; i++) {
			recambio[i+1]=desayunium[i];
		}

		//opcionesDesayunos["b0"]=desayunium;
		opcionesDesayunos["b0"]=recambio;
		prepararCanvas("b0");
	}

}