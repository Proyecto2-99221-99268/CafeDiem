<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorias;

class CategoriasController extends Controller
{
    public function index(){
    	return categorias::all();
    }
}
