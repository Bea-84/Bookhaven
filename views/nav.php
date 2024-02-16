
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a href="?controller=Articulo" class="brand-link">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16" style="color:white" >
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
</svg>
    </a>
    <button class="navbar-toggler  navbar-dark bg-white" type="button" data-bs-toggle="collapse" 
     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-dark "></span>
    </button>

    <!--DESPLEGABLE CATEGORIAS-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorías
          </a>
          <ul class="dropdown-menu">
          <?php foreach ($listacategorias as $cat) : ?>
              <li><a class="dropdown-item"
                  href="?controller=Articulo&action=listProductosxIdCat&id=<?= $cat->getIdCategorias() ?>"><?= $cat->getNombreCategoria() ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>

      <!--Centro búsqueda-->
      <form class="d-flex" role="search" action="?controller=Articulo&action=search" method="POST">
          <input class="form-control me-2" type="search" name="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-succes btn-outline-light" type="submit">Buscar</button>
      </form>

      <!--Desplegable carrito-->
      
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="?controller=pedido&action=verCesta">
   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 
              2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
   </svg>
   <?php if (isset($_SESSION['cesta']) && count($_SESSION['cesta']) > 0) : ?>
       <span class="badge bg-danger"> <!-- Icono campana que se verá si la cesta esta llena -->
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
               <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm7-2V9a5.002 5.002 0 0 0-4-4.9V3a3 3 0 0 0-6 0v1.1A5.002 5.002 0 0 0 1 9v5l-.117.356A.5.5 0 0 0 .5 15h14a.5.5 0 0 0 .617-.356L15 14zm-1-9V9a4 4 0 0 1-3 3.874V14h-2v-1.126A4 4 0 0 1 2 9V5a2 2 0 0 1 4 0v.1a6 6 0 0 0 4 0V5a2 2 0 0 1 4 0z"/>
           </svg>
       </span>
   <?php endif; ?>
</a>
        </li>
       
        <!--Desplegable Login-->

 <li class="nav-item dropdown">
 <a href="#" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
    <?php 
    // Si no hay sesión iniciada, se inicia una nueva. Si ya existe una sesión, se mantiene la misma.
    if (!isset($_SESSION)) {
        session_start();
    }
    
    // Si hay una sesión iniciada de usuario
    if (isset($_SESSION['user'])) : ?>
        <li><span class="dropdown-item"><?php echo 'Bienvenid@ , ' . $_SESSION['user']->getNombre(); ?></span></li>
        <li><a class="dropdown-item" href="?controller=usuario&action=logout">Cerrar sesión</a></li>
          
        <?php 
        // Verificar si el usuario es administrador
        if ($_SESSION['user']->getRol() == 'administrador') : ?>
            <li><a class="dropdown-item" href="?controller=admin&action=panel">Ir a panel admin</a></li>
        <?php endif; ?>
          
    <?php else: ?>
        <!-- Si no hay sesión de usuario -->
        <li><a class="dropdown-item" href="?controller=usuario&action=login">Iniciar sesión</a></li>
    <?php endif; ?>
</ul>


</li>
    </ul>

    </div>
  </div>
</nav>





