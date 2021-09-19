<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidadtodo extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function provincia() {
        return $this->belongsTo(Provinciatodo::class);

    }

    public function jobs() {
        return $this->hasMany(JobTodo::class);

    }
}
