@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier une séance 
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire de modification</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/seances/'.$seance->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="temps_debut">Temps début</label>
                                            <input type="time" class="form-control" name="temps_debut" value="{{ $seance->temps_debut }}" id="temps_debut" placeholder="Saisir temps_debut de diplome">
                                            @error('temps_debut')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="temps_fin">Temps fin</label>
                                            <input type="time" class="form-control" name="temps_fin" value="{{ $seance->temps_fin }}" id="temps_fin" placeholder="Saisir temps_fin de diplome">
                                            @error('temps_fin')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="jours">Jour</label>
                                            <select name="jours" id="jours" class="form-control">
                                                <option value="" selected disbaled>Choisir jour</option>
                                                @for($i=0; $i < count($jours); $i++)
                                                <option value="{{ $jours[$i] }}" @if($seance->jours == $jours[$i]) selected @endif>{{ $jours[$i] }}</option>
                                                @endfor
                                            </select>
                                            @error('jours')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="classe_id">Classe</label>
                                            <select name="classe_id" id="classe_id" class="form-control">
                                                <option value="" selected disbaled>Choisir classe</option>
                                                @foreach(App\Models\Classe::all() as $classe)
                                                <option value="{{ $classe->id }}" @if($seance->classe_id == $classe->id) selected @endif>{{ $classe->titre }}</option>
                                                @endforeach
                                            </select>
                                            @error('classe_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="niveau_id">Niveau</label>
                                            <select name="niveau_id" id="niveau_id" class="form-control">
                                                <option value="" selected disbaled>Choisir niveau</option>
                                                @foreach(App\Models\Niveau::all() as $niveau)
                                                <option value="{{ $niveau->id }}" @if($seance->niveau_id == $niveau->id) selected @endif>{{ $niveau->titre }}</option>
                                                @endforeach
                                            </select>
                                            @error('niveau_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="matiere_id">Matière</label>
                                            <select name="matiere_id" id="matiere_id" class="form-control">
                                                <option value="" selected disbaled>Choisir classe</option>
                                                    @foreach(App\Models\Matiere::all() as $matiere)
                                                <option value="{{ $matiere->id }}" @if($seance->matiere_id == $matiere->id) selected @endif>{{ $matiere->titre }}</option>
                                                @endforeach
                                            </select>
                                            @error('matiere_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="enseignant_id">Formateur</label>
                                            <select name="enseignant_id" id="enseignant_id" class="form-control">
                                                <option value="" selected disbaled>Choisir enseignant</option>
                                                @foreach(App\Models\Enseignant::all() as $enseignant)
                                                    <option value="{{ $enseignant->id }}" @if($seance->enseignant_id == $enseignant->id) selected @endif>{{ $enseignant->user->nom }}</option>
                                                @endforeach
                                            </select>
                                            @error('enseignant_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection