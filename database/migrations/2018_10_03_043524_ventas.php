<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas',function (Blueprint $table)
		{
			$table->increments('id_venta');
			$table->integer('id_cliente')->unsigned();
			$table->integer('id_empleado')->unsigned();
			$table->string('estado',10);
			$table->double('monto');
			$table->double('cambio');
			$table->double('total');
			$table->foreign('id_cliente')->references('id_cliente')->on('clientes');
			$table->foreign('id_empleado')->references('id_empleado')->on('empleados');
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
        Schema::drop('ventas');
    }
}
