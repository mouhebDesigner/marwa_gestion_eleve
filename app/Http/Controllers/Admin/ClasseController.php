<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classe;
use App\Models\Seance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClasseRequest;
use App\Http\Requests\NiveauRequest;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::paginate(10);

        return view('admin.classes.index', compact('classes'));
    }

    public function registre_appel($classe_id){
        
        $seances = Seance::where('classe_id', $classe_id)->paginate(10);

        return view('admin.seances.index', compact('seances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClasseRequest $request)
    {
        $niveau = new Classe();
        $niveau->titre = $request->titre;   
    
        $niveau->save();
    
        
        return redirect('admin/classes')->with('added', 'La classe a été ajouté avec succés');
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
        $niveau = Classe::find($id);

        return view('admin.classes.edit', compact('niveau'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $niveau = Classe::find($id);
        $niveau->titre = $request->titre;
    
        $niveau->save();

        return redirect('admin/classes')->with('updated', 'La classe a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classe::find($id)->delete();

        return redirect('admin/classes')->with('deleted', 'La classe a été supprimer avec succés');
    }
}
