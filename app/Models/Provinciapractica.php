<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinciapractica extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function autonomia() {
        return $this->belongsTo(Autonomiapractica::class);
    }


    public function localidades() {
        return $this->hasMany(Localidadpractica::class);

    }

    public function jobs() {
        return $this->hasMany(JobsPractica::class);

    }
}
