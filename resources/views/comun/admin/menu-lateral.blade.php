<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}" target="_blank">        
        <div class="sidebar-brand-text mx-3">
            Sunpro Redes y Sistemas
        </div>
    </a>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{url('/admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Articulos</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">
                Listar Articulos:
            </h6>
            <a class="collapse-item bg-success text-white py-1 mb-1" href="{{url('admin/articulos/alta')}}">	
                Articulos de ALTA
            </a>
            <a class="collapse-item bg-danger text-white py-1 mb-2" href="{{url('admin/articulos/baja')}}">	
                Articulos de BAJA
            </a>
            <h6 class="collapse-header">
                Herramientas
            </h6>
            <a class="collapse-item bg-dark text-white py-1" href="{{url('admin/articulos/agrupar')}}">	
                AGRUPAR Articulos
            </a>
          </div>
        </div>
      </li>
    
    <hr class="sidebar-divider d-none d-md-block">        
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>