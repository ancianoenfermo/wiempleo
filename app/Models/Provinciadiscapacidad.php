<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinciadiscapacidad extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function autonomia() {
        return $this->belongsTo(Autonomiadiscapacidad::class);
    }

    public function localidades() {
        return $this->hasMany(Localidaddiscapacidad::class);

    }

    public function jobs() {
        return $this->hasMany(JobsDiscapacidad::class);

    }
}
