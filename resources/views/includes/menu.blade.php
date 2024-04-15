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
                <li class="nav-item {{ request()->is('/') ? 'menu-open' : '' }}">
                    <a href="/" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Inicio</p></a>
                </li>
                @if(auth()->user()->hasAnyRole('Psicologo', 'Administrador'))
                <li class="nav-item {{ request()->is(['roles', 'permissions', 'users']) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('roles', 'permissions', 'users') ? 'active' : '' }}"><i class="nav-icon fas fa-clipboard-list"></i><p>Administracion<i class="right fas fa-angle-left"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('roles') }}" class="nav-link {{ request()->is('roles') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Roles</p></a>            
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('permissions') }}" class="nav-link {{ request()->is('permissions') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Permisos</p></a>            
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('users') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Usuarios</p></a>            
                            </li>
                        </ul>
                </li>
                <li class="nav-item {{ request()->is(['departamentos', 'paises', 'ciudades', 'especialidades']) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('departamentos','paises', 'ciudades', 'especialidades') ? 'active' : '' }}"><i class="nav-icon fas fa-clipboard-list"></i><p>Datos Generales<i class="right fas fa-angle-left"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                    <a href="{{ url('departamentos') }}" class="nav-link {{ request()->is('departamentos') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Departamentos</p></a>            
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('ciudades') }}" class="nav-link {{ request()->is('ciudades') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Ciudades</p></a>            
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('paises') }}" class="nav-link {{ request()->is('paises') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Paises</p></a>            
                            </li>
                        </ul>
                </li>
                <li class="nav-item {{ request()->is(['egresos', 'ingresos']) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('egresos', 'ingresos') ? 'active' : '' }}"><i class="nav-icon fas fa-dollar-sign"></i><p>Datos Contables<i class="right fas fa-angle-left"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                    <a href="{{ url('ingresos') }}" class="nav-link {{ request()->is('ingresos') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Ingresos</p></a>            
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('egresos') }}" class="nav-link {{ request()->is('egresos') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Egresos</p></a>            
                            </li>
                            
                        </ul>
                </li>
                
                @endif
                @if(auth()->user()->hasAnyRole('Paciente', 'Administrador', 'Psicologo'))
                @if (auth()->user()->hasRole('Paciente'))
                   
                    <li class="nav-item">
                        <a href="{{ url('pacientes/mi-ficha-create') }}" class="nav-link {{ request()->is('pacientes/mi-ficha-create') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Crear mi ficha</p></a>            
                    </li> 
                    <li class="nav-item">
                        <a href="{{ url('pacientes/mi-ficha') }}" class="nav-link {{ request()->is('pacientes/mi-ficha') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Mi ficha</p></a>            
                    </li> 
                @endif
                    <li class="nav-item {{ request()->is(['pacientes']) ? 'menu-open' : '' }}">
                        @if(auth()->user()->hasAnyRole('Administrador', 'Psicologo'))
                            <a href="#" class="nav-link {{ request()->is('1') ? 'active' : '' }}"><i class="nav-icon fas fa-user"></i><p>Lista de Pacientes<i class="right fas fa-angle-left"></i></p></a>
                        @endif
                        <ul class="nav nav-treeview">
                            @if(auth()->user()->hasAnyRole('Administrador', 'Psicologo'))
                                <li class="nav-item">
                                    <a href="{{ url('pacientes') }}" class="nav-link {{ request()->is('pacientes') ? 'active' : '' }}"><i class="fas fa-list nav-icon"></i><p>Pacientes</p></a>            
                                </li>
                            @endif
                           
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>