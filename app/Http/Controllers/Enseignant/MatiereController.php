<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::where('enseignant_id', Auth::user()->enseignant->id)->paginate(10);

        return view('enseignant.matieres.index', compact('matieres'));
    }
}
