<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public function results(){
    	return $this->belongsToMany('App\Model\Result', 'report_results', 'report_id', 'results_id');
    }

    public function user(){
    	return $this->belongsTo('App\Model\User');
    }
}
