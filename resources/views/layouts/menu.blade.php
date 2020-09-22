<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-store"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Sistema  <sup>Ventas</sup></div>
          </a>

          <!-- Nav Menu -->

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>


    @if (Auth::user()->getRole()->name === 'admin')
     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
       Inventario
     </div>

     <!-- Nav Item - Products Collapse Menu -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
         <i class="fas fa-shopping-cart"></i>
         <span>Productos</span>
       </a>
       <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Mantenimiento Productos</h6>
           <a class="collapse-item" href="/products/">Listado de Productos </a>
           <a class="collapse-item" href="/products/create">Crear Producto</a>
         </div>
       </div>
     </li>


     <!-- Nav Item -- Cateogries Collapse -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
          <i class="fas fa-tag"></i>
          <span>Categorías</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mantenimiento Categorías</h6>
            <a class="collapse-item" href="/categories/">Lisatado Categorías</a>
            <a class="collapse-item" href="/categories/create">Crear Categoría</a>
          </div>
        </div>
      </li>


     <!-- Nav Item -- Providers Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProviders" aria-expanded="true" aria-controls="collapseProviders">
          <i class="fas fa-truck"></i>
          <span>Proveedores</span>
        </a>
        <div id="collapseProviders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mantenimiento Proveedores </h6>
            <a class="collapse-item" href="/suppliers/">Lisatado Proveedores</a>
            <a class="collapse-item" href="/suppliers/create">Crear Proveedor</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Ventas
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers" aria-expanded="true" aria-controls="collapseCustomers">
          <i class="fas fa-users"></i>
          <span>Clientes</span>
        </a>
        <div id="collapseCustomers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mantenimiento Clientes</h6>
            <a class="collapse-item" href="/customers/">Listado de Clientes</a>
            <a class="collapse-item" href="/customers/create">Crear Cliente</a>
          </div>
        </div>
      </li>

       <!-- Nav Item - Orders Collapse Menu -->


       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseOrders">
          <i class="fas fa-cash-register"></i>
          <span>Pedidos</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestión de Pedidos</h6>
            <a class="collapse-item" href="/orders/">Listado de Pedidos</a>
            <a class="collapse-item" href="/orders/create">Crear Pedido</a>
          </div>
        </div>
      </li>

         <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Configuración Usuarios
    </div>

    <!-- Nav item - Users Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
          <i class="fas fa-users-cog"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestión de Usuarios</h6>
            <a class="collapse-item" href="/users/">Listado de Usuarios</a>
            <a class="collapse-item" href="/users/create">Crear Usuarios</a>
          </div>
        </div>
      </li>

    @endif

    @if (Auth::user()->getRole()->name === 'user')
       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
         Inventario
       </div>

       <!-- Nav Item - Products Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
           <i class="fas fa-shopping-cart"></i>
           <span>Productos</span>
         </a>
         <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Mantenimiento Productos</h6>
             <a class="collapse-item" href="/products/">Listado de Productos </a>
           </div>
         </div>
       </li>


       <!-- Nav Item -- Cateogries Collapse -->
       <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-tag"></i>
            <span>Categorías</span>
          </a>
          <div id="collapseCategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Mantenimiento Categorías</h6>
              <a class="collapse-item" href="/categories/">Lisatado Categorías</a>
            </div>
          </div>
        </li>


       <!-- Nav Item -- Providers Collapse Menu -->
       <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProviders" aria-expanded="true" aria-controls="collapseProviders">
            <i class="fas fa-truck"></i>
            <span>Proveedores</span>
          </a>
          <div id="collapseProviders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Mantenimiento Proveedores </h6>
              <a class="collapse-item" href="/suppliers/">Listado Proveedores</a>
            </div>
          </div>
        </li>


        <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Ventas
      </div>

      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers" aria-expanded="true" aria-controls="collapseCustomers">
            <i class="fas fa-users"></i>
            <span>Clientes</span>
          </a>
          <div id="collapseCustomers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Mantenimiento Clientes</h6>
              <a class="collapse-item" href="/customers/">Listado de Clientes</a>
            </div>
          </div>
        </li>

         <!-- Nav Item - Orders Collapse Menu -->


         <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseOrders">
            <i class="fas fa-cash-register"></i>
            <span>Pedidos</span>
          </a>
          <div id="collapseOrders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Gestión de Pedidos</h6>
              <a class="collapse-item" href="/orders/">Listado de Pedidos</a>
              <a class="collapse-item" href="/orders/create">Crear Pedido</a>
            </div>
          </div>
        </li>

           <!-- Divider -->
      <hr class="sidebar-divider">
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
