<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Regimenfiscales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('regimenfiscales',function (Blueprint $table)
		{
			$table->increments('id_regimenfiscal');
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
		Schema::drop('regimenfiscales');
    }
}
