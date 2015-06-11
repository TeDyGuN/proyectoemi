<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Trabajo', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('titulo', 100);
            $table->string('nombreArchivo');
            $table->string('rutaArchivo');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade');
            $table->integer('tutor_id')->unsigned();
            $table->foreign('tutor_id')->references('id')->on('users');
            $table->integer('revisor_id')->unsigned();
            $table->foreign('revisor_id')->references('id')->on('users');
            $table->integer('linea_id')->unsigned();
            $table->foreign('linea_id')->references('id')->on('lineaInvestigacion');
            $table->text('Descripcion')->nullable();
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
		Schema::drop('Trabajo');
	}

}
