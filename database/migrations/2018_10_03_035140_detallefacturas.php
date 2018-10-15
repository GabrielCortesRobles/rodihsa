<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detallefacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallefacturas',function (Blueprint $table)
		{
			$table->increments('id_detallefactura');
			$table->integer('id_factura')->unsigned();
			$table->string('clave_sat',100);
			$table->string('clave_unidad',50);
			$table->integer('cantidad');
			$table->string('unidad',50);
			$table->string('num_identificacion',50);
			$table->string('descripcion',50);
			$table->double('valor_unitario');
			$table->double('importe');
			$table->double('descuento');
			$table->boolean('impuestos');
			$table->boolean('informacionaduanera');
			$table->boolean('cuentapredial');
			$table->double('base');
			$table->integer('id_impuesto')->unsigned();
			$table->string('tasaocuota',10);
			$table->string('valortasaocuota',10);
			$table->double('impuestosimporte');
			$table->foreign('id_factura')->references('id_factura')->on('facturas');
			$table->foreign('id_impuesto')->references('id_impuesto')->on('impuestos');
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
        Schema::drop('detallefacturas');
    }
}
