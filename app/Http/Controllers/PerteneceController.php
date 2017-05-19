<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pertenece;


class PerteneceController extends Controller
{
 public function index () {
    	return pertenece::all();
    }    //
}
