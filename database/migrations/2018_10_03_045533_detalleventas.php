<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detalleventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleventas',function (Blueprint $table)
		{
			$table->increments('id_detallevanta');
			$table->integer('id_venta')->unsigned();
			$table->integer('id_producto')->unsigned();
			$table->integer('cantidad');
			$table->double('subtotal');
			$table->foreign('id_venta')->references('id_venta')->on('ventas');
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
		Schema::drop('detalleventas');
    }
}
