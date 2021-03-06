@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Liste des élèves</h1>
                        </div><!-- /.col -->
                       
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    @include('admin.includes.error-message')
                    @include('admin.includes.statistique')

                    <div class="row">
                        <div class="col-12">
                            
                            <!-- /.card -->

                            <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-between">
                                                <div id="example1_filter" class="dataTables_filter">
                                                    <label>
                                                        Chercher:
                                                        <input 
                                                        type="search" class="form-control form-control-sm" 
                                                        placeholder="" 
                                                        aria-controls="example1">
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Nom d'élève
                                                        </th>
                                                        <th>
                                                            Nom de parent
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Classe
                                                        </th>
                                                        <th>
                                                            date de creation
                                                        </th>
                                                        
                                                        <th>
                                                            date de modification
                                                        </th>
                                                        <th>
                                                            Actions
                                                        </th>

                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @foreach($eleves as $eleve)
                                                        <tr>
                                                            <td>{{ $eleve->user->nom }}</td>
                                                            <td>{{ $eleve->relative->user->nom }}</td>
                                                            <td>{{ $eleve->user->email }}</td>
                                                            <td>{{ $eleve->niveau->titre }}</td>
                                                            <td>{{ $eleve->created_at }}</td>
                                                            <td>{{ $eleve->updated_at }}</td>
                                                            <td>
                                                                <div class="d-flex justify-content-around">
                                                                    @if(App\Models\Absence::where('eleve_id', $eleve->id)->where('seance_id', $seance_id)->count() > 0)
                                                                        @if(App\Models\Absence::where('eleve_id', $eleve->id)->where('seance_id', $seance_id)->first()->absent == 'oui')
                                                                        
                                                                        <a class="btn btn-primary" href="#" onclick="return confirm('Cet éléve est mentionné comme absent')">
                                                                            Absent <i class="fas fa-check"></i>
                                                                        </a>
                                                                        @else 

                                                                            <a class="btn btn-primary" href="{{ url('enseignant/seance/'.$seance_id.'/absences/'.$eleve->id.'/absent') }}" onclick="return confirm('Voules-vous mentioner cet élève comme absent')">
                                                                                Absent
                                                                            </a>
                                                                        @endif
                                                                    @else 
                                                                        <a class="btn btn-primary" href="{{ url('enseignant/seance/'.$seance_id.'/absences/'.$eleve->id.'/absent') }}" onclick="return confirm('Voules-vous mentioner cet élève comme absent')">
                                                                            Absent
                                                                        </a>
                                                                    @endif
                                                                    @if(App\Models\Absence::where('eleve_id', $eleve->id)->where('seance_id', $seance_id)->count() > 0)
                                                                        @if(App\Models\Absence::where('eleve_id', $eleve->id)->where('seance_id', $seance_id)->first()->absent == 'non')

                                                                        <a class="btn btn-primary" href="{{ url('enseignant/seance/'.$seance_id.'/absences/'.$eleve->id.'/present') }}" onclick="return confirm('Voules-vous mentioner cet élève comme présent')">
                                                                            Présent <i class="fas fa-check"></i>
                                                                        </a>
                                                                        @else 

                                                                            <a class="btn btn-primary" href="{{ url('enseignant/seance/'.$seance_id.'/absences/'.$eleve->id.'/present') }}" onclick="return confirm('Voules-vous mentioner cet élève comme présent')">
                                                                                Présent
                                                                            </a>
                                                                        @endif
                                                                    @else 
                                                                        <a class="btn btn-primary" href="{{ url('enseignant/seance/'.$seance_id.'/absences/'.$eleve->id.'/present') }}" onclick="return confirm('Voules-vous mentioner cet élève comme présent')">
                                                                            Présent
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>
                                                            Nom d'élève
                                                        </th>
                                                        <th>
                                                            Nom de parent
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Classe
                                                        </th>
                                                        <th>
                                                            date de creation
                                                        </th>
                                                        
                                                        <th>
                                                            date de modification
                                                        </th>
                                                        <th>
                                                            Actions
                                                        </th>

                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
