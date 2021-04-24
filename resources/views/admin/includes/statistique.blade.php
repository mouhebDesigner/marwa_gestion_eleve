
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ url('admin/matieres') }}" class="info-box">
              <span class="info-box-icon bg-info elevation-1">
              <i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-white">
                    Les Matiéres
                </span>
                <span class="info-box-number text-white">
                    {{ App\Models\Matiere::count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ url('admin/enseignants') }}" class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-white">Les enseignants</span>
                <span class="info-box-number text-white">
                    {{ App\Models\Enseignant::count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ url('admin/eleves') }}" class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-white">Les élèves</span>
                <span class="info-box-number text-white">
                    {{ App\Models\Eleve::count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ url('admin/seances') }}" class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-white">Les séances</span>
                <span class="info-box-number text-white">
                    {{ App\Models\Seance::count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>