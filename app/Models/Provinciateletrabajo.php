<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinciateletrabajo extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function autonomia() {
        return $this->belongsTo(Autonomiateletrabajo::class);
    }

    public function localidades() {
        return $this->hasMany(Localidadteletrabajo::class);

    }

    public function jobs() {
        return $this->hasMany(JobsTeletrabajo::class);

    }
}
