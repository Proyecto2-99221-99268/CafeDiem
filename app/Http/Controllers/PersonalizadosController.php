<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personalizados;


class PersonalizadosController extends Controller
{
    public function index()
    {
        return personalizados::all();
    }
}
