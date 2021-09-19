<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidadteletrabajo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function provincia() {
        return $this->belongsTo(Provinciateletrabajo::class);

    }
    public function jobs() {
        return $this->hasMany(JobsTeletrabajo::class);

    }
}
