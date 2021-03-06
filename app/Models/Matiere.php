<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }

    public function niveau(){
        return $this->belongsTo(Niveau::class);

    }
    
    public function seances(){
        return $this->hasMany(Seance::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }


    
}
