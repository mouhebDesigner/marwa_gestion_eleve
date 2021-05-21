<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.cantines.index', compact('cantines'));
    }

    public function create()
    {
        $jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
        return view('admin.cantines.create', compact('jours'));
    }

    public function store(CantineRequest $request){

        $cantine = new Cantine;

        $cantine->type = $request->type;
        $cantine->temps = $request->temps;
        $cantine->jours = $request->jours;

        $cantine->save();

        for($i = 1;$i < $request->nbr_repas; $i++){
            
            $repas = new Repa;

            $repas->contenue = $request->contenue[$i];
            $repas->cantine_id = $cantine->id;

            $repas->save();
        }
        return redirect('admin/cantines')->with('added', 'La cantine a été ajouté avec succés');
    }

   
}
