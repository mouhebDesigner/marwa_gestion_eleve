@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un élève
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
                        <form action="{{ url('admin/eleves') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="relative_id">Parent d'élève</label>
                                                <select name="relative_id" id="relative_id" class="form-control">
                                                    <option value="" selected disbaled>Choisir le parent d'élève</option>
                                                    @foreach(App\Models\Relative::all() as $relative)
                                                        <option value="{{ $relative->id }}" @if(old('relative_id') == $relative->id) selected @endif>{{ $relative->user->nom }} {{ $relative->user->prenom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('relative_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="niveau_id">Niveau d'élève</label>
                                                <select name="niveau_id" id="niveau_id" class="form-control">
                                                    <option value="" selected disbaled>Choisir la classe</option>
                                                    @foreach(App\Models\Niveau::all() as $niveau)
                                                        <option value="{{ $niveau->id }}" @if(old('niveau_id') == $niveau->id) selected @endif>{{ $niveau->titre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('niveau_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nom">Nom d'élève</label>
                                                <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" id="nom" placeholder="Saisir nom d'élève">
                                                @error('nom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="prenom">Prenom d'élève</label>
                                                <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" id="prenom" placeholder="Saisir prenom d'élève">
                                                @error('prenom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="numtel">Numéro de téléphone d'élève</label>
                                                <input type="text" class="form-control" name="numtel" value="{{ old('numtel') }}" id="numtel" placeholder="Saisir numéro de téléphone d'élève">
                                                @error('numtel')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email d'élève</label>
                                                <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Saisir email d'élève">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="password">Mot de passe d'élève</label>
                                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" placeholder="Saisir mot de passe d'élève">
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirmation de mot de passe</label>
                                                <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" placeholder="Confirmer la mot de passe">
                                            </div>
                                            <div class="form-group">
                                                <label for="date_naissance">Date de naissance d'élève</label>
                                                <input type="date" class="form-control" name="date_naissance" value="{{ old('date_naissance') }}" id="date_naissance" placeholder="Saisir date naissance d'élève">
                                                @error('date_naissance')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="image">photo d'élève</label>
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