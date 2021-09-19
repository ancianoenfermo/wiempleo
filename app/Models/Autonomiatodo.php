<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomiatodo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function tipo() {
        return $this->belongsTo(Tipotodo::class);
    }

    public function provincias() {
        return $this->hasMany(Provinciatodo::class)->withDefault();

    }

    public function jobs() {
        return $this->hasMany(JobTodo::class);

    }

}
