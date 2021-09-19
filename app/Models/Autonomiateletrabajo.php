<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomiateletrabajo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function tipo() {
        return $this->belongsTo(Tipoteletrabajo::class);
    }
    public function provincias() {
        return $this->hasMany(Provinciateletrabajo::class);

    }

    public function jobs() {
        return $this->hasMany(JobsTeletrabajo::class);

    }
}
