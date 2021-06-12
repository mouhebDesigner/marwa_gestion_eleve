<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::paginate(10);

        return view('contacts.index', compact('contacts'));
    }

    public function show($id){
        $contact = Contact::find($id);

        return view('contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect('contacts')->with('deleted', 'Le message a été supprimé avec succés');
        
    }

    public function create(){
        return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact();   

        $contact->reciever_id = $request->reciever_id;
        $contact->sender_id = Auth::user()->id;
        $contact->sujet = $request->sujet;
        $contact->message = $request->message;

        $contact->save();

        if(Auth::check() && Auth::user()->grade == "enseignant")
        {
            return redirect('enseignant/contacts/create')->with('success', 'Votre message a été envoyé avec succés');
        }
        return redirect('contact')->with('signed', 'Votre message a été envoyé avec succés');

    }
}
