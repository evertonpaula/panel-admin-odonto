<?php

use App\Helpers\Utils;

Utils::requireRoute('authentication');

$painelRoutes = [
	'prefix' => 'v1',
	'middleware' => [
		'oauth:1',
		'oauth-setdb',
		],
	'namespace' => '\App\Http\Controllers\Tenant',
];

$app->group( $painelRoutes, function() use( $app ) {

	Utils::requireRoute('dashboard');

});
