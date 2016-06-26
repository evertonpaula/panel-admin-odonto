<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Clinic::class, function ($faker) {
    return [
        'name' => 'Odontopaiva',
        'domain' => 'https://www.odontopaiva.com.br',
    ];
});

$factory->define(App\Models\User::class, function ($faker) {
    return [
        'name' => 'Tom',
        'email' => 'tom@tom.com',
		  'password' => \Illuminate\Support\Facades\Hash::make('asdfasdf'),
		  'clinic_id' => 1
    ];
});
