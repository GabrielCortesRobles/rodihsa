<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detalleentradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleentradas',function (Blueprint $table)
		{
			$table->increments('id_detalleentrada');
			$table->integer('id_entrada')->unsigned();
			$table->integer('id_producto')->unsigned();
			$table->integer('cantidad');
			$table->double('subtotal');
			$table->foreign('id_entrada')->references('id_entrada')->on('entradas');
			$table->foreign('id_producto')->references('id_producto')->on('productos');
			$table->rememberToken();
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalleentradas');
    }
}
