<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Categorias;
use App\http\Controllers\imagen;

class ProductosController extends Controller
{
    public function index(){
    	return Productos::all();
    }

    public function dame($id){
    	//return Productos::find([$id, 1]);
    	return Productos::where('id', $id)->get();
    	//return compact('producto');
    }
    public function create (Request $request )
    {
    	
    	$Producto = new Productos;
    	$CategoriaNombre=$request->Categoria;
    	$Producto->idCategoria=$request->idCategoria;
    	$Producto->nombre=$request->nombre;
    	$Producto->precio=$request->precio;
    	$Producto->imagen='img/'.$Producto->nombre.'.'.$request->imagen->getClientOriginalExtension();
    	$Producto->x=$request->x;
    	$Producto->y=$request->y;
    	$Producto->w=$request->w;
    	$Producto->h=$request->h;	

	   	$imagen= request()->file('imagen');
	   	$nombreImagen = $Producto->nombre.'.'.$request->imagen->getClientOriginalExtension();
	   	$destinationPath = public_path('img');
        $imagen->move($destinationPath, $nombreImagen);
    	 $Producto->save();
    	dd($request);
    }

}
