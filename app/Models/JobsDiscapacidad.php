<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsDiscapacidad extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getListaTiposAttribute($value) {

        if(!is_null($value)) {

            return explode("|", $value);
        }
    }
    public function tipojob () {
        return $this->belongsTo(Tipodiscapacidad::class);
    }

    public function autonomia() {
        return $this->belongsTo(Autonomiadiscapacidad::class);

    }
    public function provincia() {
        return $this->belongsTo(Provinciadiscapacidad::class);
    }
    public function localidad() {
        return $this->belongsTo(Localidaddiscapacidad::class);
    }
}
