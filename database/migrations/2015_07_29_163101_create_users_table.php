<?php

use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration
{

	public function up()
	{
		Schema::create( 'users', function( $table )
		{
			$table->bigIncrements('id')->unsigned();
			$table->string('name');
			$table->string('password');
			$table->string('email')->unique();
			$table->bigInteger('clinic_id')->unsigned();
			$table->foreign('clinic_id')->references('id')->on('clinics')->onUpdate('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	public function down() {

		Schema::dropIfExists('users');
	}

}
