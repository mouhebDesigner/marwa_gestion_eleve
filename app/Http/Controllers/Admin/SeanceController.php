<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeanceRequest;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seances = Seance::paginate(10);

        return view('admin.seances.index', compact('seances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
        return view('admin.seances.create', compact('jours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeanceRequest $request)
    {
        $seance = new Seance();

        $seance->jours = $request->jours;
        $seance->temps_debut = $request->temps_debut;
        $seance->temps_fin = $request->temps_fin;
        $seance->enseignant_id = $request->enseignant_id;
        $seance->matiere_id = $request->matiere_id;
        $seance->classe_id = $request->classe_id;
        $seance->niveau_id = $request->niveau_id;

        $seance->save();

        return redirect('admin/seances')->with('added', 'La séance a été ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];

        $seance = Seance::find($id);

        return view('admin.seances.edit', compact('seance', 'jours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeanceRequest $request, $id)
    {
        $seance =  Seance::find($id);

        $seance->jours = $request->jours;
        $seance->temps_debut = $request->temps_debut;
        $seance->temps_fin = $request->temps_fin;
        $seance->enseignant_id = $request->enseignant_id;
        $seance->matiere_id = $request->matiere_id;

        $seance->save();

        return redirect('admin/seances')->with('updated', 'La séance a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seance::find($id)->delete();
        return redirect('admin/seances')->with('deleted', 'La séance a été supprimer avec succés');
        
    }
}
