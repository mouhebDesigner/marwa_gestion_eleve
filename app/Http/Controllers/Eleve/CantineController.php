<?php

namespace App\Http\Controllers\Eleve;

use App\Models\Repa;
use App\Models\Cantine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CantineRequest;

class CantineController extends Controller
{
    public function index()
    {
        $cantines = Cantine::paginate(10);

        return view('eleve.cantines.index', compact('cantines'));
    }

    

   
}
