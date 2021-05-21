<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
    
    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }

    public function classe(){
        return $this->belongsTo(Classe::class);
    } 
}
