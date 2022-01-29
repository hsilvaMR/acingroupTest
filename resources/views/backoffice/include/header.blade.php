<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="https://mdbgo.com/">
            <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="16" alt="MDB Logo"
                loading="lazy" style="margin-top: -1px;" />
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>  
                </li>
            </ul>
            <!-- Left links }}" -->

            <div class="d-flex align-items-center">

                <a href="{{ route('logout') }}">
                    <button type="button" class="btn btn-link px-3 me-2">
                        LOGOUT
                    </button>
                </a>

                <a href="{{ route('gestUser') }}">
                    <button type="button" class="btn btn-primary me-3">
                        Gestão de Utilizador
                    </button>
                </a>
                <a href="{{ route('gestOficina') }}">
                    <button type="button" class="btn btn-primary me-3">
                        Gestão de Oficina
                    </button>
                </a>

                <a href="{{ route('gestClient') }}">
                    <button type="button" class="btn btn-primary me-3">
                        Gestão de Clientes
                    </button>
                </a>

                <div class="dropdown"> 
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"   data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>

                {{-- <a class="btn btn-dark px-3" href="https://github.com/mdbootstrap/mdb-ui-kit" role="button">
                    <i class="fas fa-user"></i>
                </a> --}}
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
