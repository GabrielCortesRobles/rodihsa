<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tipofacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('tipofacturas',function (Blueprint $table)
		{
			$table->increments('id_tipofactura');
			$table->string('clave',1);
			$table->string('descripcion',100);
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
        Schema::drop('tipofacturas');
    }
}
