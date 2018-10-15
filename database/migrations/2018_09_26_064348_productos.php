<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table)
		{
			$table->increments('id_producto');
			$table->string('nom_producto',100);
			$table->string('marca',50);
			$table->integer('id_proveedor')->unsigned();
			$table->string('codigo',50);
			$table->string('codigo_sat',50);
			$table->integer('existencia');
			$table->string('descripcion',150);
			$table->double('precio_cu');
			$table->double('precio_menudeo');
			$table->double('precio_mayoreo');
			$table->integer('piezas_mediomayoreo');
			$table->integer('piezas_mayoreo');
			$table->string('activo');
			$table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores');
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
		Schema::drop('productos');
    }
}
