<?php

namespace App\Http\Controllers\Admin;

use App\Models\Niveau;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NiveauRequest;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveaux = Niveau::paginate(10);

        return view('admin.niveaux.index', compact('niveaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.niveaux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NiveauRequest $request)
    {
        $niveau = new Niveau();
        $niveau->titre = $request->titre;   
    
        $niveau->save();
    
        
        return redirect('admin/niveaux')->with('added', 'Le niveau a été ajouté avec succés');
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
        $niveau = Niveau::find($id);

        return view('admin.niveaux.edit', compact('niveau'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NiveauRequest $request, $id)
    {
        $niveau = Niveau::find($id);
        $niveau->titre = $request->titre;
    
        $niveau->save();

        return redirect('admin/niveaux')->with('updated', 'Le niveau a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Niveau::find($id)->delete();

        return redirect('admin/niveaux')->with('deleted', 'Le niveau a été supprimer avec succés');
    }
}
