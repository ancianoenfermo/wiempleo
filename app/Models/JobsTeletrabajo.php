<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsTeletrabajo extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function getListaTiposAttribute($value) {

        if(!is_null($value)) {

            return explode("|", $value);
        }
    }
    public function tipojob () {
        return $this->belongsTo(Tipoteletrabajo::class);
    }

    public function autonomia() {
        return $this->belongsTo(Autonomiateletrabajo::class);

    }
    public function provincia() {
        return $this->belongsTo(Provinciateletrabajo::class);
    }
    public function localidad() {
        return $this->belongsTo(Localidadteletrabajo::class);
    }
}
