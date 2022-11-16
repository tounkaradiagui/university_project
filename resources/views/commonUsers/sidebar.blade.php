<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">G - <sup>Etudiant</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Etudiants
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#étudiants" aria-expanded="true" aria-controls="étudiants">
            <i class="fas fa-users"></i>
            <span>Gérer des étudiants</span>
        </a>
        <div id="étudiants" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Etudiants:</h6>
                <a class="collapse-item" href="{{route('registration.etudiants')}}">Inscription</a>
                <a class="collapse-item" href="{{route('list.etudiants')}}">Bacheliers CENOU</a>
                <a class="collapse-item" href="{{route('etudiants.validate')}}">Néo-bachelier inscris</a>
            </div>
        </div>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Facultés
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('etudiants.fasso')}}">
            <i class="fas fa-university"></i>
            <span>FASSO</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('etudiants.fama')}}">
            <i class="fas fa-university"></i>
            <span>FAMA</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('etudiants.iufp')}}">
            <i class="fas fa-university"></i>
            <span>IUFP</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('etudiants.fages')}}">
            <i class="fas fa-university"></i>
            <span>FAGES</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->