<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration {


	public function up()
	{
		Schema::create('Eventos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('titulo_evento',60);
            $table->string('start', 30);
            $table->string('backgroundColor', 7);
            $table->string('borderColor', 7);
            $table->boolean('allDay');
            $table->string('id_eventoCallendar', 6);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade');
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('Eventos');
	}

}
