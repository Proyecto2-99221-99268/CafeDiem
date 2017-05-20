<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertenece extends Model
{
   protected $table = 'perteneces';

	protected $fillable = ['idDesayuno', 'idCategoria', 'idProductos'];

}
