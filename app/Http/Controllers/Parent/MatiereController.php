<?php

namespace App\Http\Controllers\Parent;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::where('niveau_id', Auth::user()->eleve->niveau_id)->paginate(10);

        return view('parent.matieres.index', compact('matieres'));
    }
}
