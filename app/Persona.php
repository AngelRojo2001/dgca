<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";

    public $timestamps = false;

    public function usuarios() {
    	return $this->hasMany('App\User');
    }

    public function consultores() {
    	return $this->hasMany('App\Consultor');
    }

    public function rlegals() {
    	return $this->hasMany('App\RLegal');
    }
}
