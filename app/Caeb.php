<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caeb extends Model
{
    protected $table = "caeb";

    public $timestamps = false;

    public function industriales() {
    	return $this->belongsToMany('App\UnidadIndustrial');
    }
}
