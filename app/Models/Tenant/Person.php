<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'persons';

	protected $fillable = ['name','lastname', 'birthday'];

	protected $hidden = ['created_at', 'updated_at'];

	public $rules = [
		'name' => 'required|string',
		'lastname' => 'required|string',
		'birthday' => 'required|date',
	];

}
