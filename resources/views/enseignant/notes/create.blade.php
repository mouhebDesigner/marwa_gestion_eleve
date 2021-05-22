@extends('admin.layouts.master')

@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un note
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
                        <form action="{{ route('notes.store', ['matiere_id' => $matiere_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="eleve_id">Elèves</label>
                                            <select name="eleve_id" id="eleve_id" class="form-control">
                                                <option value="" selected disbaled>Choisir élève</option>
                                                @foreach($eleves as $eleve)
                                                    @if(!App\Models\Note::where('eleve_id', $eleve->id)->where('matiere_id', $matiere_id)->first())
                                                    <option value="{{ $eleve->id }}" @if(old('eleve_id') == $eleve->id) selected @endif>{{ $eleve->user->nom }} {{ $eleve->user->prenom }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('eleve_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <input type="number" class="form-control" name="note" value="{{ old('note') }}" id="note" placeholder="Saisir note">
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
