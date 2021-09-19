<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoteletrabajo extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function autonomiasteletrabajo() {
        return $this->hasMany(Autonomiateletrabajo::class);
    }
    public function jobs () {
        return $this->hasMany(JobsTeletrabajo::class);
    }
}
