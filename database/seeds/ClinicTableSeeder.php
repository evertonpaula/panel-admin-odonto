<?php

use Illuminate\Database\Seeder;
use App\Models\Clinic;


class ClinicTableSeeder extends Seeder
{

	public function run()
	{
		factory(App\Models\Clinic::class, 1)->create();
	}

}
