<?php

namespace App\Http\Controllers\Admin;

use App\Models\Repa;
use Illuminate\Http\Request;
use App\Http\Requests\RepaRequest;
use App\Http\Controllers\Controller;

class RepaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($cantine_id){
        $repas = Repa::where('cantine_id', $cantine_id)->paginate(10);

        return view('admin.repas.index', compact('repas', 'cantine_id'));
    }


   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cantine_id)
    {
        return view('admin.repas.create', compact('cantine_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepaRequest $request, $cantine_id)
    {
        $repa = new Repa();

        $repa->contenue = $request->contenue;   
        $repa->cantine_id = $request->cantine_id;   
    
        $repa->save();
    
        
        return redirect('admin/cantine/'.$cantine_id.'/repas')->with('added', 'Le repa a été ajouté avec succés');
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
        $repa = Repa::find($id);

        return view('admin.repas.edit', compact('repa'));
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
        $repa = Repa::find($id);

        $repa->contenue = $request->contenue;     
    
        $repa->save();
    

        return redirect('admin/cantine/'.$repa->cantine_id.'/repas')->with('updated', 'Le repas a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cantine_id = Repa::find($id)->cantine_id;
        Repa::find($id)->delete();

        return redirect('admin/cantine/'.$cantine_id.'/repas')->with('deleted', 'Le repas a été supprimer avec succés');
    }
}
