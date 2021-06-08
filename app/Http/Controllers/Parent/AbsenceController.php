<?php

namespace App\Http\Controllers\Parent;

use Auth;
use App\Models\Eleve;
use App\Models\Seance;
use App\Models\Absence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenceController extends Controller
{
    public function index()
    {
        $eleve_ids = Auth::user()->relative->eleves()->get('id');
        $seances = Absence::with('seance')->whereIn('eleve_id', $eleve_ids)->get();
        // return $seances;
        // $seances = Seance::whereIn('id', $seance_ids)->get();

        // return $seances;
        // $classe_id = Seance::find($seance_id)->classe_id;
        // $eleves = Eleve::where('classe_id', $classe_id)->paginate(10);

        return view('parent.absences.index', compact('seances'));
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
