<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsPractica extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function getListaTiposAttribute($value) {

        if(!is_null($value)) {

            return explode("|", $value);
        }
    }
    public function tipojob () {
        return $this->belongsTo(Tipopractica::class);
    }



    public function autonomia() {
        return $this->belongsTo(Autonomiapractica::class);

    }
    public function provincia() {
        return $this->belongsTo(Provinciapractica::class);
    }
    public function localidad() {
        return $this->belongsTo(Localidadpractica::class);
    }

}
