<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <span class="d-block text-white">Usuario Logueado: </span>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item {{ request()->is('roles') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('roles') ? 'active' : '' }}"><i class="nav-icon fas fa-clipboard-list"></i><p>Administracion<i class="right fas fa-angle-left"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                    <a href="{{ url('roles') }}" class="nav-link {{ request()->is('roles') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Roles</p></a>            
                            </li>
                        </ul>
                </li>
               
            </ul>
        </nav>
    </div>
</aside>