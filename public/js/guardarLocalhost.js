function guardar(){ 
	
	console.log("soy un simple mortal");

	// var myJSON = localStorage.getItem("desayuno");
	// //if (myJSON != null)
	// //{
	// 	localStorage.removeItem("desayuno");
	// 	var desa = JSON.stringify(opcionesDesayunos["b0"]);
	// 	localStorage.setItem("desayuno",desa);
	// //}
	//console.log(localStorage.getItem("desayuno"));
}

function recuperar(){
	var myJSON = localStorage.getItem("desayuno");
	if (myJSON != null){
		 var desayunium = JSON.parse(myJSON);
		//console.log(JSON.stringify(desayunium));	
		opcionesDesayunos["b0"]=desayunium;
		prepararCanvas("b0");
	}
}