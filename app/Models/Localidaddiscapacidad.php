<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidaddiscapacidad extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function provincia() {
        return $this->belongsTo(Provinciadiscapacidad::class);

    }

    public function jobs() {
        return $this->hasMany(JobsDiscapacidad::class);

    }
}
