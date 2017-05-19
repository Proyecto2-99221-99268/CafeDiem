<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pertenece;

class pertenece extends Model
{
    public function index () {
    	return pertenece::all();
    }
}
