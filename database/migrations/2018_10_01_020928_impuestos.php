<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Impuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuestos',function (Blueprint $table)
		{
			$table->increments('id_impuesto');
			$table->string('clave',3);
			$table->string('descripcion',100);
			$table->string('retencion',2);
			$table->string('traslado',2);
			$table->string('activo',2);
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
        Schema::drop('impuestos');
    }
}
