<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rai extends Model
{
    protected $table = "rai";

    public $timestamps = false;

    public function usuario() {
        return $this->belongsTo('App\Usuario');
    }

    public function consultor() {
        return $this->belongsTo('App\Consultor');
    }

    public function unidadIndustrial() {
    	return $this->belongsTo('App\unidadIndustrial');
    }
}
