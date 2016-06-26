<?php

$app->get('dashboard', function () {
	$person = \App\Models\Tenant\Person::find(1);
	return response()->json($person);
});
