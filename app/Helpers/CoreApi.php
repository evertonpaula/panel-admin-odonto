<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

class CoreApi
{
	public function passwordGrantVerifier( $username, $password )
	{
		$user = User::where('email', $username)->first();

		 if($user && Hash::check($password, $user->password)) {
			  return $user->id;
		 }

		 return false;
	}
}
