<?php

namespace App\Http\Controllers\Parent;

use App\Models\Seance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmploiController extends Controller
{
    public function index()
    {
        $seances = Seance::where('classe_id', Auth::user()->eleve->classe_id)->where('niveau_id',Auth::user()->eleve->niveau_id)->paginate(10);

        return view('parent.emplois.index', compact('seances'));
    }
}
