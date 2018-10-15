<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Entradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas',function (Blueprint $table)
		{
			$table->increments('id_entrada');
			$table->integer('id_proveedor')->unsigned();
			$table->integer('id_empleado')->unsigned();
			$table->double('total');
			$table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores');
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
        Schema::drop('entradas');
    }
}
