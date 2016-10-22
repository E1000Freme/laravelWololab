<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	protected $table = 'patients';

	public function user(){
		return $this->belongsTo('App\Model\User');
	}
}
