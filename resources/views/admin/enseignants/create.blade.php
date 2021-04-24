@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un enseignant
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
                        <form action="{{ url('admin/enseignants') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="nom">Nom d'enseignant</label>
                                                <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" id="nom" placeholder="Saisir nom d'enseignant">
                                                @error('nom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="prenom">Prenom d'enseignant</label>
                                                <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" id="prenom" placeholder="Saisir prenom d'enseignant">
                                                @error('prenom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="numtel">Numéro de téléphone d'enseignant</label>
                                                <input type="text" class="form-control" name="numtel" value="{{ old('numtel') }}" id="numtel" placeholder="Saisir numéro de téléphone d'enseignant">
                                                @error('numtel')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email d'enseignant</label>
                                                <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Saisir email d'enseignant">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Spécialité d'enseignant</label>
                                                <input type="text" class="form-control" name="specialite" value="{{ old('specialite') }}" id="specialite" placeholder="Saisir spécialité d'enseignant">
                                                @error('specialite')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Mot de passe d'enseignant</label>
                                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" placeholder="Saisir mot de passe d'enseignant">
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirmation de mot de passe</label>
                                                <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" placeholder="Confirmer la mot de passe">
                                            </div>
                                            <div class="form-group">
                                                <label for="date_naissance">Date de naissance d'enseignant</label>
                                                <input type="date" class="form-control" name="date_naissance" value="{{ old('date_naissance') }}" id="date_naissance" placeholder="Saisir date naissance d'enseignant">
                                                @error('date_naissance')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="image">photo d'enseignant</label>
                                                <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="photo" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="image">Choisir image</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Télécharger</span>
                                                </div>
                                                </div>
                                                @error('image')
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