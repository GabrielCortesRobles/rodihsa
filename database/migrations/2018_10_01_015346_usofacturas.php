<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usofacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usofacturas',function (Blueprint $table)
		{
			$table->increments('id_usofactura');
			$table->string('descripcion',100);
			$table->string('tipo_persona',6);
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
        Schema::drop('usofacturas');
    }
}
