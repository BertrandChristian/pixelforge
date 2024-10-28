<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <span class="brand-text font-weight-light">ScholarPlus</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    @if(in_array(Auth::user()->role, ['prodi', 'fakultas']))
                        <li class="nav-item">
                            <a href="{{ route('periodebs-list') }}" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Periode Beasiswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('beasiswa_detail-list') }}" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Beasiswa Detail
                                </p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('prodi-list') }}" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Program Studi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('fakultas-list') }}" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Fakultas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jenis_beasiswa-list') }}" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Jenis Beasiswa
                            </p>
                        </a>
                    </li>
                        <li class="nav-item">
                            <a href="{{ route('user-list') }}" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'mahasiswa')
                        <li class="nav-item">
                            <a href="{{ route('periodebs-list') }}" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Periode Beasiswa
                                </p>
                            </a>
                        </li>
                    @endif
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="nav-icon fa fa-sign-out"></i>Logout
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
