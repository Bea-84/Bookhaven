<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?" class="brand-link">
        <img src="dist/img/logo3.jpg" alt="AdminLTE Logo" class="brand-image " style="width: 3rem;">
        <span class="brand-text font-weight-light">Bookhaven</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-header">USUARIOS</li>
                        <li class="nav-item">
                            <a href="?controller=Dashboard&action=listUsuarios" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Ver Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?controller=Dashboard&action=addUsuario" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Añadir Usuario</p>
                            </a>
                        </li>
                      
                       
                      
<!------------------------------------------------------------------------------------------------------------------------------------->
                        <li class="nav-header">PRODUCTOS</li>
                        <li class="nav-item">
                            <a href="?controller=Dashboard" class="nav-link">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>Ver productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?controller=Dashboard&action=addProducto" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Añadir productos</p>
                            </a>
                        </li>
                      
                      
<!------------------------------------------------------------------------------------------------------------------------------------->
                        <li class="nav-header">CATEGORIAS</li>
                        <li class="nav-item">
                            <a href="?controller=Dashboard&action=listCategorias" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Ver categorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?controller=Dashboard&action=addCategoria" class="nav-link">
                                <i class="nav-icon fas fa-plus-square"></i>
                                <p>Añadir categorias</p>
                            </a>
                        </li>

 <!------------------------------------------------------------------------->                   
                        <li class="nav-header">PEDIDOS</li>
                        <li class="nav-item">
                            <a href="?controller=Dashboard&action=listPedidos" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>Ver pedidos</p>
                            </a>
                        </li>  
                       
                       
                    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>