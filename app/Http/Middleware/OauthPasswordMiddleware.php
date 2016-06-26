<?php

namespace App\Http\Middleware;

use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use Illuminate\Support\Facades\Config;
use App\Helpers\ClientConnected;
use App\Models\Clinic;
use App\Models\User;
use Closure;
use DB;

class OauthPasswordMiddleware
{
	private $clientConnected;

	public function __construct( ClientConnected $clientConnected ) {
		$this->clientConnected = $clientConnected;
	}

	public function handle( $request, Closure $next )
	{
		if( Authorizer::getResourceOwnerId() ) {
			$userid = Authorizer::getResourceOwnerId();
			$user = User::find($userid);
			$dbname = sprintf('db_clinic_%06d', $user->clinic_id);
			$this->clientConnected->setUser( $user);
			Config::set( 'database.connections.mysql.database', $dbname );
			DB::reconnect('mysql');
		}

		return $next( $request );
	}
}
