<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-item @if(Request::is('home')) active @endif">
        <a href="{{ url('home') }}" class="nav-link ">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Acceuil
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
  
    <li class="nav-item @if(Request::is('admin/secretaires*')) active @endif">
        <a href="{{ url('admin/secretaires') }}" class="nav-link ">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
            Gérer les secretaires
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('admin/enseignants*')) active @endif">
        <a href="{{ url('admin/enseignants') }}" class="nav-link ">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
            Gérer les enseignants
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('admin/parents*')) active @endif">
        <a href="{{ url('admin/parents') }}" class="nav-link ">
            <i class="nav-icon fas fa-user-secret"></i>
            <p>
            Gérer les parents
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('admin/eleves*')) active @endif">
        <a href="{{ url('admin/eleves') }}" class="nav-link ">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
            Gérer les élèves
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('admin/classes*')) active @endif">
        <a href="{{ url('admin/classes') }}" class="nav-link ">
            <i class="nav-icon fas fa-school"></i>
            <p>
            Gérer les classes
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('admin/niveaux*')) active @endif">
        <a href="{{ url('admin/niveaux') }}" class="nav-link ">
            <i class="nav-icon fas fa-school"></i>
            <p>
            Gérer les niveaux
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
   
    
    <li class="nav-item @if(Request::is('admin/matieres*')) active @endif">
        <a href="{{ url('admin/matieres') }}" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Gérer les matiéres
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('*seance*')) active @endif">
        <a href="{{ url('admin/seances') }}" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Gérer les seances
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    
    <li class="nav-item @if(Request::is('admin/abscence*')) active @endif">
        <a href="{{ url('admin/abscence') }}" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Gérer les abscence
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('admin/cantines') }}" class="nav-link @if(Request::is('*cantine*')) active @endif">
            <i class="nav-icon fas fa-utensils"></i>
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