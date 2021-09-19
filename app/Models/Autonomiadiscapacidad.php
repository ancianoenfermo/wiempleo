<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomiadiscapacidad extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function tipo() {
        return $this->belongsTo(Tipodiscapacidad::class);
    }

    public function provincias() {
        return $this->hasMany(Provinciadiscapacidad::class)->withDefault();;

    }

    public function jobs() {
        return $this->hasMany(JobsDiscapacidad::class);

    }
}
