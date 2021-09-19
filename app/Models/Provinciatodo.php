<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinciatodo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function autonomia() {
        return $this->belongsTo(Autonomiatodo::class);
    }

    public function localidades() {
        return $this->hasMany(Localidadtodo::class);

    }

    public function jobs() {
        return $this->hasMany(JobTodo::class);

    }
}
