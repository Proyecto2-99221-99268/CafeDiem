<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertenecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perteneces', function (Blueprint $table) {
            // $table->increments('id');
            // $table->increments('k');
            // $table->engine = 'InnoDB';
            $table->integer('idDesayuno')->unsigned();
            $table->integer('idCategoria')->unsigned();
            $table->integer('idProductos')->unsigned();
            $table->timestamps();
            $table->primary(['idDesayuno', 'idCategoria','idProductos']);
            // // $table->foreign('idDesayuno')->references('id')->on('personalizados');
            // $table->foreign('idCategoria')->references('id')->on('productos');
            // $table->foreign('idProductos')->references('idLocal')->on('productos');

        });

       Schema::table('perteneces', function(Blueprint $table) {
            
            $table->foreign('idDesayuno')->references('id')->on('personalizados');
            $table->foreign('idCategoria')->references('id')->on('categorias');
            // $table->foreign('idProductos')->references('idLocal')->on('productos');     
        });
        // DB::unprepared('ALTER TABLE `perteneces` DROP PRIMARY KEY, ADD PRIMARY KEY (  `idDesayuno` ,  `idCategoria`,`idProductos` )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perteneces');
    }
}
