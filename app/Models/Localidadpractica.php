<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidadpractica extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function provincia() {
        return $this->belongsTo(Provinciapractica::class);

    }
    public function jobs() {
        return $this->hasMany(JobsPractica::class);

    }
}
