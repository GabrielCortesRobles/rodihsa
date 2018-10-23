<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('clientes',function (Blueprint $table)
		{
			$table->increments('id_cliente');
			$table->string('nom_cliente',50);
			$table->string('ap_cliente',50);
			$table->string('am_cliente',50);
			$table->string('rfc_cliente',10);
			$table->string('curp_cliente',18);
			$table->date('fecha_nacimiento');
			$table->integer('id_municipio')->unsigned();
			$table->string('localidad',50);
			$table->integer('cp');
			$table->string('calle',100);
			$table->string('num_interior',10);
			$table->string('num_exterior',10);
			$table->string('correo',100);
			$table->string('telefono',10);
			$table->string('sexo',10);
			$table->string('activo',2);
			$table->string('archivo',200);
			$table->foreign('id_municipio')->references('id_municipio')->on('municipios');
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
		Schema::drop('clientes');
    }
}
