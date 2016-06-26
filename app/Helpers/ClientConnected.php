<?php

namespace App\Helpers;

use App\Models\User;

class ClientConnected
{
	/**
	 * @var User
	 */
	protected $user;

	public function setUser(User $user)
	{
		$this->user = $user;
	}

}
