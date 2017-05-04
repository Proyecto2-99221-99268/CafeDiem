<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    public function index(){
    	return Productos::all();
    }

    public function dame($id){
    	//return Productos::find([$id, 1]);
    	return Productos::where('idCategoria', $id)->get();
    	//return compact('producto');
    }
}
