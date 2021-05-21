<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Relative;
use Illuminate\Http\Request;
use App\Http\Requests\ParentRequest;

class RegisterParentController extends Controller
{
    public function store(ParentRequest $request)
    {
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->grade = $request->grade;
        $user->numtel = $request->numtel;
        $user->date_naissance = $request->date_naissance;
        $user->grade = "parent";
        $user->save();

        $parent = new Relative();
        $parent->user_id = $user->id;
        $parent->save();

        return redirect('login')->with('stored', 'Vous avez crée votre compte essayer de connecter maintenant');
    }
}
