<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerteneceUsuarioDesayunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertenece_usuario_desayunos', function (Blueprint $table) {
            $table->increments('idModelos');
            $table->integer('idCategoria')->unsigned();
            $table->integer('idProductos')->unsigned();
            $table->primary('idModelos');
            $table->timestamps();
        });

    Schema::table('pertenece_usuario_desayunos', function(Blueprint $table) {
        
        $table->foreign('idModelos')->references('id')->on('users');
  
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertenece_usuario_desayunos');
    }
}
