<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('empleados',function (Blueprint $table)
		{
			$table->increments('id_empleado');
			$table->string('nom_empleado',50);
			$table->string('ap_empleado',50);
			$table->string('am_empleado',50);
			$table->string('rfc_empleado',10);
			$table->string('curp_empleado',18);
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
			$table->integer('id_departamento')->unsigned();
			$table->string('contrasena',250);
			$table->integer('privilegio_almacen');
			$table->integer('privilegio_venta');
			$table->integer('privilegio_caja');
			$table->integer('privilegio_admin');
			$table->foreign('id_municipio')->references('id_municipio')->on('municipios');
			$table->foreign('id_departamento')->references('id_departamento')->on('departamentos');
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
		Schema::drop('empleados');
    }
}
