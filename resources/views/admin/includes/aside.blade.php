<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gestion d'élève</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nom  }} {{ Auth::user()->prenom }} </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item">
        <div class="search-title">
          <b class="text-light"></b>N<b class="text-light"></b>o<b class="text-light"></b> <b class="text-light"></b>e<b class="text-light"></b>l<b class="text-light"></b>e<b class="text-light"></b>m<b class="text-light"></b>e<b class="text-light"></b>n<b class="text-light"></b>t<b class="text-light"></b> <b class="text-light"></b>f<b class="text-light"></b>o<b class="text-light"></b>u<b class="text-light"></b>n<b class="text-light"></b>d<b class="text-light"></b>!<b class="text-light"></b>
        </div>
        <div class="search-path">
          
        </div>
      </a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{ url('home') }}" class="nav-link @if(Request::is('home')) active @endif">
                <i class="fas fa-home"></i>
                <p>
                  Acceuil
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="{{ url('admin/enseignants') }}" class="nav-link @if(Request::is('admin/enseignants*')) active @endif">
              <i class="fas fa-chalkboard-teacher"></i>
              <p>
                Gérer les enseignants
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/parents') }}" class="nav-link @if(Request::is('admin/parents*')) active @endif">
            <i class="fas fa-user-secret"></i>
              <p>
                Gérer les parents
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/classes') }}" class="nav-link @if(Request::is('classes*')) active @endif">
              <i class="fas fa-school"></i>
              <p>
                Gérer les classes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/eleves') }}" class="nav-link @if(Request::is('admin/eleves*')) active @endif">
              <i class="fas fa-user-graduate"></i>
              <p>
                Gérer les élèves
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('admin/matieres') }}" class="nav-link @if(Request::is('matieres*')) active @endif">
              <i class="fas fa-book"></i>
              <p>
                Gérer les matiéres
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{ url('admin/abscence') }}" class="nav-link @if(Request::is('abscence*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les abscence
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/cantines') }}" class="nav-link @if(Request::is('cantines*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les cantines
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('admin/contacts') }}" class="nav-link @if(Request::is('contacts*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les contacts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>