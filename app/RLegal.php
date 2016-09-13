<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RLegal extends Model
{
    protected $table = "r_legal";

    public $timestamps = false;

    public function persona() {
    	return $this->belongsTo('App\Persona');
    }

    public function unidad_industrial() {
    	return $this->belongsTo('App\UnidadIndustrial');
    }
}
