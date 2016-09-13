<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultor extends Model
{
    protected $table = "consultor";

    public $timestamps = false;

    public function rais() {
        return $this->hasMany('App\Rai');
    }

    public function persona() {
    	return $this->belongsTo('App\Persona');
    }
}
