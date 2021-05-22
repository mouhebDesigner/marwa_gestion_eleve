<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Seance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmploiController extends Controller
{
    public function index()
    {
        $seances = Seance::where('enseignant_id', Auth::user()->enseignant->id)->paginate(10);

        return view('enseignant.emplois.index', compact('seances'));
    }
}
