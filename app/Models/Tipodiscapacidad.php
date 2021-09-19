<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipodiscapacidad extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function autonomiasdiscapacidads() {
        return $this->hasMany(Autonomiadiscapacidad::class);
    }
    public function jobs () {
        return $this->hasMany(JobsDiscapacidad::class);
    }
}
