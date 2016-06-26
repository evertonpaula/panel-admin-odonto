<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
	use SoftDeletes;

	protected $table = 'clinics';
	protected $fillable = ['name','domain'];

	public $rules = [
		'domain' => 'required|string',
		'name' => 'required|string',
	];

	public function users() {
		return $this->hasMany( 'App\Models\User', 'clinic_id', 'id' );
	}

	public static function boot()
	{
		parent::boot();

		Clinic::saving( function( $theClinic )
		{
			if( empty($theClinic->uuid) ) {
				$theClinic->uuid = str_random(128);
			}
		});
	}

}
