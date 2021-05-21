@extends('admin.layouts.master')

@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un matière
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire d'ajout</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/matieres') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="nom">Enseignant</label>
                                                <select name="enseignant_id" id="" class="form-control">
                                                    <option value="" selected disbaled>Choisir un enseignant</option>
                                                    @foreach(App\Models\Enseignant::all() as $enseignant)
                                                        <option value="{{ $enseignant->id }}" @if(old('enseignant_id') == $enseignant->id) selected @endif>{{ $enseignant->user->nom }} {{ $enseignant->user->prenom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('enseignant_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="niveau_id">Le niveau</label>
                                                <select name="niveau_id" id="niveau_id" class="form-control">
                                                    <option value="" selected disbaled>Choisir le classe</option>
                                                    @foreach(App\Models\Niveau::all() as $niveau)
                                                        <option value="{{ $niveau->id }}" @if(old('niveau_id') == $niveau->id) selected @endif>{{ $niveau->titre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('niveau_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="classe_id">La classe</label>
                                                <select name="classe_id" id="classe_id" class="form-control">
                                                    <option value="" selected disbaled>Choisir le classe</option>
                                                    @foreach(App\Models\Classe::all() as $classe)
                                                        <option value="{{ $classe->id }}" @if(old('classe_id') == $classe->id) selected @endif>{{ $classe->titre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('classe_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="titre">Titre de matière</label>
                                                <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" id="titre" placeholder="Saisir titre d'élève">
                                                @error('titre')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-info">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection