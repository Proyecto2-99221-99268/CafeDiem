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
        Schema::create('modelosUSR', function (Blueprint $table) {
            $table->integer('idModelos')->unsigned();
            $table->integer('idCategoria')->unsigned();
            $table->integer('idProductos')->unsigned();
            $table->timestamps();
            
            $table->primary(['idModelos','idCategoria','idProductos']);
        });

    Schema::table('modelosUSR', function(Blueprint $table) {
        
        $table->foreign('idModelos')->references('id')->on('modelos_usuarios');
  
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelosUSR');
    }
}
