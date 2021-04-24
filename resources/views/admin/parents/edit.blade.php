@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un parent
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
                        <form action="{{ url('admin/parents/'.$parent->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="nom">Nom de parent</label>
                                                <input type="text" class="form-control" name="nom" value="{{ $parent->nom }}" id="nom" placeholder="Saisir nom de parent">
                                                @error('nom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="prenom">Prenom de parent</label>
                                                <input type="text" class="form-control" name="prenom" value="{{ $parent->prenom }}" id="prenom" placeholder="Saisir prenom de parent">
                                                @error('prenom')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="numtel">Numéro de téléphone de parent</label>
                                                <input type="text" class="form-control" name="numtel" value="{{ $parent->numtel }}" id="numtel" placeholder="Saisir numéro de téléphone de parent">
                                                @error('numtel')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email de parent</label>
                                                <input type="text" class="form-control" name="email" value="{{ $parent->email }}" id="email" placeholder="Saisir email de parent">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                          
                                            <div class="form-group">
                                                <label for="password">Mot de passe de parent</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Saisir mot de passe de parent">
                                                @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirmation de mot de passe</label>
                                                <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" placeholder="Confirmer la mot de passe">
                                            </div>
                                            <div class="form-group">
                                                <label for="date_naissance">Date de naissance de parent</label>
                                                <input type="date" class="form-control" name="date_naissance" value="{{ $parent->date_naissance }}" id="date_naissance" placeholder="Saisir date naissance de parent">
                                                @error('date_naissance')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="image">photo de parent</label>
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