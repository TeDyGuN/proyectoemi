<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecoTablaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recoTabla', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('reco')->nullable();
            $table->integer('status');
            $table->integer('trabajo')->unsigned();
            $table->foreign('trabajo')->references('id')->on('trabajo');
            $table->integer('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->integer('revisor')->unsigned();
            $table->foreign('revisor')->references('id')->on('users');
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
		Schema::drop('recoTabla');
	}

}
