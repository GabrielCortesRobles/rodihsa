<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas',function (Blueprint $table)
		{
			$table->increments('id_empresa');
			$table->string('nom_empresa',100);
			$table->string('rfc_empresa',50);
			$table->string('razon_social',100);
			$table->integer('id_regimenfiscal')->unsigned();
			$table->string('imagen_empresa',250);
			$table->integer('id_municipio')->unsigned();
			$table->string('localidad',50);
			$table->integer('cp');
			$table->string('calle',100);
			$table->string('num_interior',10);
			$table->string('num_exterior',10);
			$table->string('correo',100);
			$table->string('telefono',10);
			$table->string('activo',2);
			$table->foreign('id_regimenfiscal')->references('id_regimenfiscal')->on('regimenfiscales');
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
		Schema::drop('empresas');
    }
}
