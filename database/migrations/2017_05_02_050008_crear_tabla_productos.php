<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idCategoria")->unsigned();
            $table->string("nombre");
            $table->float("precio");
            $table->string("imagen");
            $table->float('x');
            $table->float('y');
            $table->float('w');
            $table->float('h');

            
            $table->timestamps();
            $table->foreign('idCategoria')->references('id')->on('categorias');
         //   $table->primary(array('id', 'idCategoria'));


        });
        DB::unprepared('ALTER TABLE `productos` DROP PRIMARY KEY, ADD PRIMARY KEY (  `id` ,  `idCategoria` )');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
