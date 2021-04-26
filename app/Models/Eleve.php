<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function relative(){
        return $this->belongsTo(Relative::class);
    }
    
    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }

    
}
