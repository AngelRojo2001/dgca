<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadIndustrial extends Model
{
    protected $table = "unidad_industrial";

    public $timestamps = false;

    public function caebs() {
    	return $this->belongsToMany('App\Caeb', 'caeb_ui');
    }

    public function rlegals() {
    	return $this->hasMany('App\RLegal');
    }

    public function rais() {
    	return $this->hasmany('App\Rai');
    }
}
