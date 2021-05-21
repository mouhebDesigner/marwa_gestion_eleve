<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repa extends Model
{
    use HasFactory;

    public function cantine(){
        return $this->belongsTo(Cantine::class);
    }
}
