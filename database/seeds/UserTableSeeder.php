<?php

use Illuminate\Database\Seeder;
use App\Models\Clinic;


class UserTableSeeder extends Seeder
{

	public function run()
	{
		factory(App\Models\User::class, 1)->create();
	}

}
