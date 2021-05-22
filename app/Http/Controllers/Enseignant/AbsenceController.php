<?php

namespace App\Http\Controllers\Enseignant;

use Auth;
use App\Models\Eleve;
use App\Models\Seance;
use App\Models\Absence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenceController extends Controller
{
    public function index($seance_id)
    {
        $classe_id = Seance::find($seance_id)->classe_id;
        $eleves = Eleve::where('classe_id', $classe_id)->paginate(10);

        return view('enseignant.eleves.index', compact('eleves', 'seance_id'));
    }

    public function absent($seance_id, $eleve_id){

        $absence = new Absence();

        $absence->absent = 'oui';
        $absence->seance_id = $seance_id;
        $absence->enseignant_id = Auth::user()->enseignant->id;
        $absence->eleve_id = $eleve_id;

        $absence->save();

        return redirect()->back()->with('added', 'L\'élève a été mentionné comme absent');
    }
    
    public function present($seance_id, $eleve_id){

        $absence = new Absence();

        $absence->absent = 'non';
        $absence->seance_id = $seance_id;
        $absence->enseignant_id = Auth::user()->enseignant->id;
        $absence->eleve_id = $eleve_id;

        $absence->save();

        return redirect()->back()->with('added', 'L\'élève a été mentionné comme présent');
    }

}
