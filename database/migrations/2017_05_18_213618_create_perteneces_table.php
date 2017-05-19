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
            $table->integer('idDesayuno');
            $table->integer('idCategoria');
            $table->integer('idProductos')->unsigned();
           
            $table->foreign('idDesayuno')->references('id')->on('personalizados');
            $table->foreign('idCategoria')->references('id')->on('productos');
            $table->foreign('idProductos')->references('id')->on('productos');

            $table->timestamps();
        });

       Schema::table('perteneces', function(Blueprint $table) {
            $table->foreign('idDesayuno')->references('id')->on('personalizados');
            $table->foreign('idCategoria')->references('id')->on('productos');
            $table->foreign('idProductos')->references('id')->on('productos');     
        });
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
