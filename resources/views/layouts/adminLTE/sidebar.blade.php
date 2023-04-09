  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-gray bg-gray-dark elevation-4 sidebar-no-expand ">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('img/app/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{auth()->user()->company}}</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('img/app/usuario.svg')}}" class="img-circle elevation-2" alt="Us">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->last_name.', '.auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 nav-collapse-hide-child">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{request()->routeIs('dashboard') ? 'active' : ''}}">
              <i class="fa-solid fa-house"></i>
              <p>
                Home
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-header">APIARIO</li>
          <li class="nav-item">
            <a href="{{route('visitas.index')}}" class="nav-link {{request()->routeIs('visitas.index') ? 'active' : ''}}">
              <i class="fa-solid fa-location-dot"></i>
              <p>
                Visitas
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-header">AJUSTES</li>
          {{-- CONFIGURACION --}}
          <li class="nav-item
            {{request()->routeIs('apiarios.index') ? 'menu-open' : ''}}
            {{request()->routeIs('cosechas.index') ? 'menu-open' : ''}}
            {{request()->routeIs('enfermedades.index') ? 'menu-open' : ''}}
            {{request()->routeIs('plagas.index') ? 'menu-open' : ''}}
            {{request()->routeIs('medicinas.index') ? 'menu-open' : ''}}
            ">
            <a href="#" class="nav-link
              {{request()->routeIs('apiarios.index') ? 'active' : ''}}
              {{request()->routeIs('cosechas.index') ? 'active' : ''}}
              {{request()->routeIs('enfermedades.index') ? 'active' : ''}}
              {{request()->routeIs('plagas.index') ? 'active' : ''}}
              {{request()->routeIs('medicinas.index') ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                CONFIGURACION
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('apiarios.index')}}" class="nav-link {{request()->routeIs('apiarios.index') ? 'active' : ''}}">
                  <i class="fa-brands fa-forumbee"></i>
                  <p>
                    Apiarios
                    {{-- <span class="right badge badge-danger">New</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('cosechas.index')}}" class="nav-link {{request()->routeIs('cosechas.index') ? 'active' : ''}}">
                  <i class="fa-solid fa-calendar-days"></i>
                  <p>
                    Cosechas
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('enfermedades.index')}}" class="nav-link {{request()->routeIs('enfermedades.index') ? 'active' : ''}}">
                  <i class="fa-solid fa-disease"></i>
                  <p>
                    Enfermedades
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('plagas.index')}}" class="nav-link {{request()->routeIs('plagas.index') ? 'active' : ''}}">
                  <i class="fa-solid fa-bug"></i>
                  <p>
                    Plagas
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('medicinas.index')}}" class="nav-link {{request()->routeIs('medicinas.index') ? 'active' : ''}}">
                  <i class="fa-solid fa-syringe"></i>
                  <p>
                    Medicamentos
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">USUARIO</li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link {{request()->routeIs('logout') ? 'active' : ''}}">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <p>
                Cerrar sesion
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>