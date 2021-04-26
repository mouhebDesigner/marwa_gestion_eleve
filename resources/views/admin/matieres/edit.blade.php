@extends('admin.layouts.master')

@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un matière
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
                        <form action="{{ url('admin/matieres/'.$matiere->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="nom">Enseignant</label>
                                                <select name="enseignant_id" id="" class="form-control">
                                                    <option value="" selected disbaled>Choisir un enseignant</option>
                                                    @foreach(App\Models\Enseignant::all() as $enseignant)
                                                        <option value="{{ $enseignant->id }}" @if($matiere->enseignant_id == $enseignant->id) selected @endif>{{ $enseignant->user->nom }} {{ $enseignant->user->prenom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('enseignant_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="niveau_id">Niveau d'élève</label>
                                                <select name="niveau_id" id="niveau_id" class="form-control">
                                                    <option value="" selected disbaled>Choisir la classe</option>
                                                    @foreach(App\Models\Niveau::all() as $niveau)
                                                        <option value="{{ $niveau->id }}" @if($matiere->niveau->niveau_id == $niveau->id) selected @endif>{{ $niveau->titre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('niveau_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="titre">Titre de matière</label>
                                                <input type="text" class="form-control" name="titre" value="{{ $matiere->titre }}" id="titre" placeholder="Saisir titre d'élève">
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