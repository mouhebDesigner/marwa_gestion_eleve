<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EleveRequest;

class RegisterEleveController extends Controller
{
    public function store(EleveRequest $request){
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->grade = $request->grade;
        $user->numtel = $request->numtel;
        $user->date_naissance = $request->date_naissance;
        $user->grade = "eleve";

        if($request->hasFile('photo')){
            $user->photo = $request->photo->store('images');
        }
        
        $user->save();
        $eleve = new Eleve();

        $eleve->niveau_id = $request->niveau_id;
        $eleve->user_id = $user->id;
        $eleve->relative_id = $request->relative_id;    
        $eleve->save();

        
        return redirect('login')->with('stored', 'Vous avez crée votre compte essayer de connecter maintenant');

    }
}
