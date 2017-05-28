<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagenURL;

class ImagenURLController extends Controller
{
    public function compartir(Request $Request){
    	
    	$png =$Request->data;
		$filteredData=substr($png, strpos($png, ",")+1);
		$unencodedData=base64_decode($filteredData);
		//genero la URL
		$url=uniqid('Desayunos_', true);
		$ruta ='compartirImagenes/'.$url.'.png';
		$fp = fopen( $ruta, 'wb' );
		//$fp = fopen($ruta, 'wb' );
		fwrite( $fp, $unencodedData);
		fclose( $fp );
		// //guardar el modelo
		$imagen = new imagenURL;
		$imagen->url=$url;
		$imagen->imagenRuta=$ruta;
		$imagen->save();

		$acompartir=url('/').'/'.$ruta;

		return $acompartir;
    }


    public function obtener($url){
    	$imagen = imagenURL::where('url', $url)->first()->select("imagenRuta");

    	return view('MisVistas.compartir',compact('imagen'));
    }
}
