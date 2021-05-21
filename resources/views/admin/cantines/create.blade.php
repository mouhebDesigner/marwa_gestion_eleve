@extends('admin.layouts.master')

@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un cantine
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
                        <form action="{{ url('admin/cantines') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="" selected disbaled>Choisir type</option>
                                                <option value="petit_déjeuner">petit déjeuner</option>
                                                <option value="déjeuner">déjeuner</option>
                                            </select>
                                            @error('type')
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
                                                <option value="{{ $jours[$i] }}" @if(old('jours') == $jours[$i]) selected @endif>{{ $jours[$i] }}</option>
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
                                            <label for="temps">Temps</label>
                                            <input type="time" class="form-control" name="temps" value="{{ old('temps') }}" id="temps" placeholder="Saisir nombre de repas">
                                            @error('temps')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="nbr_repas">Nombre de repas</label>
                                            <input type="number" class="form-control" name="nbr_repas" value="{{ old('nbr_repas') }}" id="nbr_repas" placeholder="Saisir nombre de repas">
                                            @error('nbr_repas')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="repas">

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
    <script>
        $('#nbr_repas').keyup(function(){
            console.log($(this).val());
            $("#repas").empty();
            
            for(i = 1; i <= $(this).val(); i++){

                var repa = document.createElement("div"); 
                repa.classList.add('row');
                repa.innerHTML = '<div class="col-md-8 offset-md-2">'+
                                            '<div class="form-group">'+
                                                '<label for="contenue">Repas '+i+' </label>'+
                                                '<input type="text" class="form-control" name="contenue[]" value="{{ old('contenue') }}" id="contenue" placeholder="Saisir repas '+i+'">'+
                                                '@error("contenue")'+
                                                '<p class="text-danger">{{ $message }}</p>'+
                                                '@enderror'+
                                            '</div>'+
                                        '</div>';    
                $('#repas').append(repa);
            }

        });
    </script>
@endsection
