<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomiapractica extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function tipo() {
        return $this->belongsTo(Tipopractica::class);
    }

    public function provincias() {
        return $this->hasMany(Provinciapractica::class);

    }

    public function jobs() {
        return $this->hasMany(JobsPractica::class);

    }
}
