<?php

use Illuminate\Database\Migrations\Migration;


class CreateClinicsTable extends Migration
{

	public function up()
	{
		Schema::create( 'clinics', function( $table )
		{
			$table->bigIncrements('id')->unsigned();
			$table->string('name');
			$table->string('uuid', 128);
			$table->string('domain');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	public function down()
	{
		Schema::drop('clinics');
	}

}
