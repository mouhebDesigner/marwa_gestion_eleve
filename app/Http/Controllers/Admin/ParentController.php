<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Relative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ParentRequest;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = Relative::paginate(10);

        return view('admin.parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect('admin/parents')->with('added', 'Le parent a été ajouté avec succés');
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
        $parent = User::find($id);

        return view('admin.parents.edit', compact('parent'));
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


        return redirect('admin/parents')->with('updated', 'Le parent a été modifié avec succés');
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

        return redirect('admin/parents')->with('deleted', 'Le parent a été supprimer avec succés');
    }
}
