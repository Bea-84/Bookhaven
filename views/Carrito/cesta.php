<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver mi cesta</title>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>

<?php include_once 'views/nav.php'; ?>



<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Mi cesta</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Cabecera tabla -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Imagen</th>
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Nombre del producto</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Precio</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Cantidad</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center py-3 px-4" style="width: 100px;">Acciones</th>
                    
                  </tr>
                </thead>
                <tbody>

                <?php

                // Inicio variable fuera del bucle
                $total = 0;  
                foreach ($_SESSION['cesta'] as $lineacarrito) {
                $total += $lineacarrito["articulo"]->getPrecio() * $lineacarrito['cantidad'];
                ?>

                  <tr>
                   <td><img class="" src="img/<?= $lineacarrito['articulo']->getImg() ?>" alt="Card image cap"></td>
                    <td><?= $lineacarrito['articulo']->getNombre() ?></td>
                    <td><?= $lineacarrito['articulo']->getPrecio() ?></td>
                    <td><?= $lineacarrito['cantidad'] ?></td>
                    <td><?= $lineacarrito['articulo']->getPrecio() * $lineacarrito['cantidad'] ?>  €</td>
                    <td>
                    <a href="?controller=Pedido&action=deleteProducto&idProducto=<?= $lineacarrito['articulo']->getIdProductos() ?>">
                    <i class="fa-solid fa-trash"></i>
                    <p>Eliminar</p>
                    </a>
                    </td>
                    </tr>
                    <?php } ?>
        
               
        
                </tbody>
              </table>
            </div>
            <!--Precio total-->
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Precio total</label>
                  <div class="text-large"><strong><?= $total ?> € </strong></div>
                </div>
              </div>
            </div>
            <!--Botones-->
            <div class="float-right">

            <!-- Si existe sesion de usuario te mostrará botón comprar y botón volver tienda --> 
    <?php
      if (isset($_SESSION['user'])) {?>
              <a  class="btn btn-dark btn-default md-btn-flat mt-2 mr-3" href="?controller=Articulo">Volver a la tienda</a>
              <a  class="btn btn-dark btn-primary mt-2" href="?controller=Pedido&action=addPedido">Comprar</a>
              <!--si no existe sesion de usuario te mostrará botón registrarse y volver a tienda-->
              <?php } else { ?>
                <a  class="btn btn-dark btn-default md-btn-flat mt-2 mr-3" href="?controller=Dashboard&action=addUsuario">Registrarse</a>
                <a  class="btn btn-dark btn-default md-btn-flat mt-2 mr-3" href="?controller=Articulo">Volver a la tienda</a>
                <?php } ?>
            </div>
        
          </div>
      </div>
  </div>



<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/e8a23d1527.js" crossorigin="anonymous"></script>
</body>
</html>