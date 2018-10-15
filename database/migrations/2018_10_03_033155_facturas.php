<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Facturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas',function (Blueprint $table)
		{
			$table->increments('id_factura');
			$table->integer('id_empresa')->unsigned();
			$table->integer('id_tipofactura')->unsigned();
			$table->integer('id_cliente')->unsigned();
			$table->integer('id_usofactura')->unsigned();
			$table->foreign('id_empresa')->references('id_empresa')->on('empresas');
			$table->foreign('id_tipofactura')->references('id_tipofactura')->on('tipofacturas');
			$table->foreign('id_cliente')->references('id_cliente')->on('clientes');
			$table->foreign('id_usofactura')->references('id_usofactura')->on('usofacturas');
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
        Schema::drop('facturas');
    }
}
