<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EnseignantRequest;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants = Enseignant::paginate(10);

        return view('admin.enseignants.index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.enseignants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnseignantRequest $request)
    {
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->grade = $request->grade;
        $user->numtel = $request->numtel;
        $user->date_naissance = $request->date_naissance;
        $user->grade = "enseignant";
        if($request->hasFile('photo')){
            $user->photo = $request->photo->store('images');
        }
        $user->save();
        $enseignant = new Enseignant();

        $enseignant->specialite = $request->specialite;
        $enseignant->type = $request->type;
        $enseignant->user_id = $user->id;
        $enseignant->save();

        
        return redirect('admin/enseignants')->with('added', 'L\'enseignant a été ajouté avec succés');
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
        $enseignant = User::find($id);

        return view('admin.enseignants.edit', compact('enseignant'));
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
        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        
        $request->validate([
            'numtel' => "required | numeric | digits:8 | unique:users,numtel,".$id.",id",
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$id.",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'date_naissance' => 'required',
            'specialite' => 'required'
        ]);
            
        $user =  User::find($id);
      

       

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        if(isset($request->password))
            $user->password = Hash::make($request->password);
        $user->numtel = $request->numtel;
        $user->date_naissance = $request->date_naissance;

        if($request->hasFile('photo')){
            $user->photo = $request->photo->store('images');
        }

        $user->save();

        $enseignant_id = Enseignant::where('user_id', $id)->first()->id;
        $enseignant =  Enseignant::find($enseignant_id);

        $enseignant->specialite = $request->specialite;


        $enseignant->save();

        $enseignant->save();

        return redirect('admin/enseignants')->with('updated', 'L\'enseignant a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('admin/enseignants')->with('deleted', 'L\'enseignant a été supprimer avec succés');
    }
}
