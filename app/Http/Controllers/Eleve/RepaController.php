<?php

namespace App\Http\Controllers\Eleve;

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

        return view('eleve.repas.index', compact('repas', 'cantine_id'));
    }


   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
