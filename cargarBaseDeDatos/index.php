<?php
$json4='[
{"idDesayuno":1,  "idCategoria":1, "idProductos":0},
{"idDesayuno":1, "idCategoria":1,  "idProductos":1},
{"idDesayuno":1, "idCategoria":1,  "idProductos":5},
{"idDesayuno":1,  "idCategoria":2, "idProductos":0},
{"idDesayuno":1,  "idCategoria":2, "idProductos":1},
{"idDesayuno":1,  "idCategoria":2, "idProductos":3},
{"idDesayuno":1, "idCategoria":3,  "idProductos":2},
{"idDesayuno":1, "idCategoria":4,  "idProductos":0},
{"idDesayuno":1,  "idCategoria":4, "idProductos":1},
{"idDesayuno":1,  "idCategoria":4, "idProductos":2},
{"idDesayuno":1,  "idCategoria":4, "idProductos":3},
{"idDesayuno":1,  "idCategoria":5, "idProductos":3},
{"idDesayuno":1,  "idCategoria":6, "idProductos":2},
{"idDesayuno":2,  "idCategoria":1, "idProductos":0},
{"idDesayuno":2, "idCategoria":1,  "idProductos":1},
{"idDesayuno":2, "idCategoria":1,  "idProductos":2},
{"idDesayuno":2,  "idCategoria":2, "idProductos":0},
{"idDesayuno":2,  "idCategoria":2, "idProductos":1},
{"idDesayuno":2,  "idCategoria":2, "idProductos":4},
{"idDesayuno":2, "idCategoria":3,  "idProductos":0},
{"idDesayuno":2, "idCategoria":4,  "idProductos":0},
{"idDesayuno":2,  "idCategoria":4, "idProductos":1},
{"idDesayuno":2,  "idCategoria":5, "idProductos":2},
{"idDesayuno":2,  "idCategoria":6, "idProductos":1},
{"idDesayuno":3,  "idCategoria":1, "idProductos":0},
{"idDesayuno":3, "idCategoria":1,  "idProductos":1},
{"idDesayuno":3, "idCategoria":1,  "idProductos":2},
{"idDesayuno":3, "idCategoria":1,  "idProductos":3},
{"idDesayuno":3, "idCategoria":1,  "idProductos":4},
{"idDesayuno":3,  "idCategoria":2, "idProductos":0},
{"idDesayuno":3,  "idCategoria":2, "idProductos":2},
{"idDesayuno":3,  "idCategoria":2, "idProductos":3},
{"idDesayuno":3,  "idCategoria":2, "idProductos":4},
{"idDesayuno":3, "idCategoria":3,  "idProductos":0},
{"idDesayuno":3, "idCategoria":3,  "idProductos":1},
{"idDesayuno":3, "idCategoria":3,  "idProductos":2},
{"idDesayuno":3,  "idCategoria":4, "idProductos":0},
{"idDesayuno":3,  "idCategoria":4, "idProductos":1},
{"idDesayuno":3,  "idCategoria":4, "idProductos":2},
{"idDesayuno":3,  "idCategoria":4, "idProductos":3},
{"idDesayuno":3,  "idCategoria":5, "idProductos":6},
{"idDesayuno":3,  "idCategoria":6, "idProductos":0}
]';
$json3='[
{"id":1,"nombre":"matero"},
{"id":2,"nombre":"clasico"},
{"id":3,"nombre":"especial"}
]';
$json2='[
{"id":1,"nombre":"bebidas","permitirMasDeUnElemento":1,"pintarAlFondo":0},
{"id":2,"nombre":"panaderia","permitirMasDeUnElemento":1,"pintarAlFondo":0},
{"id":3,"nombre":"frutas","permitirMasDeUnElemento":1,"pintarAlFondo":0},
{"id":4,"nombre":"dulces","permitirMasDeUnElemento":1,"pintarAlFondo":0},
{"id":5,"nombre":"tazas","permitirMasDeUnElemento":0,"pintarAlFondo":0},
{"id":6,"nombre":"bandejas","permitirMasDeUnElemento":0,"pintarAlFondo":1}
]';
$json='[
{"idCategoria":1, "nombre":"leche","id":0,"precioPorUnidad":5.00,"imagen":"/img/bebida/leche.png", "x":0.1, "y":0.4, "w":0.17, "h":0.17},
{"idCategoria":1, "nombre":"cafe","id":1,"precioPorUnidad":10.00,"imagen":"/img/bebida/cafe1.png","x":0.1, "y":0.6, "w":0.15, "h":0.15 },
{"idCategoria":1, "nombre":"te","id":2,"precioPorUnidad":8.00,"imagen":"/img/bebida/te.png","x":0.25, "y":0.4, "w":0.20, "h":0.20 },
{"idCategoria":1, "nombre":"jugo","id":3,"precioPorUnidad":6.00,"imagen":"/img/bebida/jugo.png","x":0.25, "y":0.6, "w":0.20, "h":0.20 },
{"idCategoria":1, "nombre":"yogur","id":4,"precioPorUnidad":9.00,"imagen":"/img/bebida/yogur.png","x":0.4, "y":0.6, "w":0.15, "h":0.15  },
{"idCategoria":1, "nombre":"mate","id":5,"precioPorUnidad":20.00,"imagen":"/img/bebida/mate.png","x":0.4, "y":0.4, "w":0.20, "h":0.20  },
{"idCategoria":2, "nombre":"medialuna","id":0,"precioPorUnidad":4.00,"imagen":"/img/pyc/medialuna.png","x":0.75, "y":0.45, "w":0.15, "h":0.15 },
{"idCategoria":2, "nombre":"bizcochuelo","id":1,"precioPorUnidad":10.00,"imagen":"/img/pyc/bizcocho.png","x":0.65, "y":0.55, "w":0.13, "h":0.13},
{"idCategoria":2, "nombre":"torta","id":2,"precioPorUnidad":20.00,"imagen":"/img/pyc/torta.png","x":0.9, "y":0.45, "w":0.20, "h":0.20},
{"idCategoria":2, "nombre":"tostada","id":3,"precioPorUnidad":0.30,"imagen":"/img/pyc/tostadas.png","x":0.8, "y":0.555, "w":0.15, "h":0.15},
{"idCategoria":2, "nombre":"magdalenas","id":4,"precioPorUnidad":0.40,"imagen":"/img/pyc/magdalenas.png","x":0.85, "y":0.65, "w":0.17, "h":0.15},{"idCategoria":3, "nombre":"manzana","id":0,"precioPorUnidad":3.00,"imagen":"/img/fr/manzana.png","x":0.77, "y":0.3, "w":0.15, "h":0.15 },
{"idCategoria":3, "nombre":"frutilla","id":1,"precioPorUnidad":13.00,"imagen":"/img/fr/frutillas.png","x":0.6, "y":0.4, "w":0.17, "h":0.15 },
{"idCategoria":3, "nombre":"naranja","id":2,"precioPorUnidad":2.00,"imagen":"/img/fr/naranja.png","x":0.52, "y":0.55, "w":0.12, "h":0.12 },{"idCategoria":4, "nombre":"manteca","id":0,"precioPorUnidad":2.00,"imagen":"/img/dlc/manteca.png","x":0.22, "y":0.76, "w":0.2, "h":0.15 },
{"idCategoria":4, "nombre":"dulce de leche","id":1,"precioPorUnidad":3.50,"imagen":"/img/dlc/ddll.png","x":0.63, "y":0.72, "w":0.15, "h":0.15 },
{"idCategoria":4, "nombre":"miel","id":2,"precioPorUnidad":4.00,"imagen":"/img/dlc/miel.png","x":0.73, "y":0.7, "w":0.15, "h":0.15 },
{"idCategoria":4, "nombre":"mermelada de frutilla","id":3,"precioPorUnidad":3.75,"imagen":"/img/dlc/mermFrutilla.png","x":0.35, "y":0.74, "w":0.15, "h":0.15 },{"idCategoria":5, "nombre":"taza naranja", "id":0,"precioPorUnidad":11.00, "imagen":"/img/tazas/tazaNaranja.png","x":0.5, "y":0.72, "w":0.17, "h":0.17 },
{"idCategoria":5, "nombre":"taza roja", "id":1,"precioPorUnidad":11.50, "imagen":"/img/tazas/taza roja.png","x":0.5, "y":0.72, "w":0.17, "h":0.17 },
{"idCategoria":5, "nombre":"taza azul", "id":2,"precioPorUnidad":12.00, "imagen":"/img/tazas/taza azul.png","x":0.5, "y":0.72, "w":0.17, "h":0.17 },
{"idCategoria":5, "nombre":"taza verde", "id":3,"precioPorUnidad":12.00, "imagen":"/img/tazas/taza verde.png","x":0.5, "y":0.72, "w":0.17, "h":0.17 },
{"idCategoria":5, "nombre":"taza blanca con cuchara rosa", "id":4,"precioPorUnidad":12.00, "imagen":"/img/tazas/taza blanza con cuchara rosa.png","x":0.5, "y":0.72, "w":0.17, "h":0.17 },
{"idCategoria":5, "nombre":"taza blanca con cuchara naranja", "id":5,"precioPorUnidad":10.00, "imagen":"/img/tazas/taza blanza con cuchara naranja.png","x":0.5, "y":0.72, "w":0.17, "h":0.17 },
{"idCategoria":5, "nombre":"taza blanca con cuchara azul", "id":6,"precioPorUnidad":14.00, "imagen":"/img/tazas/taza blanza con cuchara azul.png","x":0.5, "y":0.72, "w":0.17, "h":0.17 },{"idCategoria":6, "nombre":"Bandeja de madera","id":0,"precioPorUnidad":20.00,"imagen":"/img/bandeja/bandejaMadera.png","x":0.5, "y":0.85, "w":0.9, "h":0.35},
{"idCategoria":6, "nombre":"tabla de madera","id":1,"precioPorUnidad":21.00,"imagen":"/img/bandeja/tabla madera.png","x":0.5, "y":0.85, "w":0.9, "h":0.45},
{"idCategoria":6, "nombre":"canasta de madera","id":2,"precioPorUnidad":22.00,"imagen":"/img/bandeja/canasta madera.png","x":0.5, "y":0.90, "w":0.8, "h":0.4}
]';
echo "hola mundo";
$productos = json_decode($json, true);
$categorias=json_decode($json2,true);
$personalizados=json_decode($json3,true);
$perteneces=json_decode($json4,true);
$server = "localhost";
$user = "root";
$pass = "";
$bd = "desayunos";
//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");
$i=0;
echo "cargue la categoria"+ $i;
foreach ($categorias as $categoria) {
   //echo "hola"; 
    mysqli_query($conexion,"INSERT INTO categorias (id,nombre,permitirMasDeUnElemento,pintarAlFondo) 
    VALUES ('".$categoria['id']."','".$categoria['nombre']."',".$categoria['permitirMasDeUnElemento'].",'".$categoria['pintarAlFondo']."')"); 
    echo "cargue la categoria"+ $i;
    $i++;
        
} 
foreach ($productos as $producto) {
   //echo "hola"; 
    mysqli_query($conexion,"INSERT INTO productos (idCategoria,idLocal,nombre,precio,imagen,x,y,w,h) 
    VALUES ('".$producto['idCategoria']."','".$producto['id']."','".$producto['nombre']."',".$producto['precioPorUnidad'].",'".$producto['imagen']."','".$producto['x']."','".$producto['y']."','".$producto['w']."',".$producto['h'].")"); 
        
} 
foreach ($personalizados as $personalizado) {
   //echo "hola"; 
    mysqli_query($conexion,"INSERT INTO personalizados (nombre) 
    VALUES ('".$personalizado['nombre']."')");  
    
        
}
foreach ($perteneces as $pertenece) {
   //echo "hola"; 
    mysqli_query($conexion,"INSERT INTO perteneces (idDesayuno,idCategoria, idProductos) 
    VALUES ('".$pertenece["idDesayuno"]."','".$pertenece["idCategoria"]."',
        '".$pertenece["idProductos"]."')"); 
    
     
} 
mysqli_close($conexion);
?>