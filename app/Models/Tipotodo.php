<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipotodo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function autonomiastodos() {
        return $this->hasMany(Autonomiatodo::class);
    }
    public function jobs () {
        return $this->hasMany(JobTodo::class);
    }

}
