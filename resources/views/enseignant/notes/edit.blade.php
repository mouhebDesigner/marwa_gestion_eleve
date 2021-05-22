@extends('admin.layouts.master')

@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un note
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
                        <form action="{{ route('notes.update', ['note' => $note->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="eleve_id">Elèves</label>
                                            <select name="eleve_id" id="eleve_id" class="form-control">
                                                <option value="" selected disbaled>Choisir le parent d'élève</option>
                                                @foreach($eleves as $eleve)
                                                    <option value="{{ $eleve->id }}" @if($note->eleve_id == $eleve->id) selected @endif>{{ $eleve->user->nom }} {{ $eleve->user->prenom }}</option>
                                                @endforeach
                                            </select>
                                            @error('eleve_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="note">Note </label>
                                            <input type="text" class="form-control" name="note" value="{{ $note->note }}" id="note" placeholder="Saisir note">
                                            @error("note")
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div
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
@section('script')
    
@endsection
