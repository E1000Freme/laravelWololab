<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\User as User;
use App\Model\Role as Role;

class AjaxController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('ajax');
	}
     /**
     * Autocomplete
     */
    public function getPatientByName($name){

    	$patients = Role::with('users')->where('name', 'patient')->first();


    	$filteredPatients = $patients->users->filter(function($item) use ($name){

    		return preg_match("/".$name."/i", $item);

    	})->values();


    	return $filteredPatients;

    }
}
