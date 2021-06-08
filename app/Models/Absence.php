<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }

    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }

   
    
    public function seance(){
        return $this->belongsTo(Seance::class);
    }


    


}
