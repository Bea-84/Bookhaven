

<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid  ">

<!--Logo-->

  <a href="?controller=Articulo" class="brand-link ">
    <img src="dist/img/logo3.jpg" alt="Logo" class="brand-image  " style= "width: 3rem;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

        <!--Centro de búsqueda-->
      
        <form class="d-flex justify-content-center" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-success btn-outline-light" type="submit">Buscar</button>
        </form>
           


      
      <!--ICONO CARRITO-->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="" title="Carrito">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
            <path
              d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
          </svg>
          </a>
        </li>
            

             
          
      <!-- Icono de persona con menú desplegable -->
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
    </a>
    <ul class="dropdown-menu ">
        <?php 
        session_start();
        if (isset($_SESSION['user'])) : ?>
            <li><span class="dropdown-item"><?php echo $_SESSION['user']->getNombre(); ?></span></li>
            <li><a class="dropdown-item" href="?controller=usuario&action=logout">Cerrar sesión</a></li>
        <?php else : ?>
            <li><a class="dropdown-item" href="?controller=usuario&action=login">Iniciar sesión</a></li>
        <?php endif; ?>
    </ul>
</li>

  
  


        <!--Desplegable categorias-->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">Categorías</a>
          <ul name="idCategoria" class="dropdown-menu">
            <?php foreach ($listacategorias as $cat) : ?>
              <li><a class="dropdown-item"
                  href="?controller=Articulo&action=listProductosxIdCat&id=<?= $cat->getIdCategorias() ?>"><?= $cat->getNombreCategoria() ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>


     
       

  </div>
</nav>