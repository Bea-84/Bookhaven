<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver mi cesta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>

<?php include_once 'views/nav.php'; ?>

<div class="text-center text-black">
    <h2>Mi cesta</h2>
</div>

<pre></pre>

<div class="card mb-3 border-dark " style="max-width: 2000px;">

<?php

// Inicio variable fuera del bucle
$total = 0;  
foreach ($_SESSION['cesta'] as $lineacarrito) {
    $total += $lineacarrito["articulo"]->getPrecio() * $lineacarrito['cantidad'];
?>
    <div class="row g-0">
        <div class="col-md-4 ">
            <pre></pre>
            <img class="img-fluid rounded-start" src="img/<?= $lineacarrito['articulo']->getImg() ?>" alt="Card image cap">
            <pre></pre>
        </div>
        <div class="col-md-8">
            <div class="card-body d-flex align-items-center">
                <div>
                    <p class="card-title text-black">Nombre: <?= $lineacarrito['articulo']->getNombre() ?></p>
                    <p class="card-text text-black">Precio: <?= $lineacarrito['articulo']->getPrecio() ?> €</p>
                    <p class="card-text text-black">Cantidad: <?= $lineacarrito['cantidad'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</div>

<div>
    <p class="text-black">Total: <?= $total ?> €</p>
        <!-- Si existe sesion de usuario te mostrará botón comprar y botón volver tienda --> 
    <?php
      if (isset($_SESSION['user'])) {?>
        <a class="btn btn-dark" href="?controller=Pedido&action=addPedido">Comprar</a>
        <a class="btn btn-dark" href="?controller=Articulo">Volver a la tienda</a>
        <!--si no existe sesion de usuario te mostrará botón registrarse-->
    <?php } else { ?>
        <a class="btn btn-dark" href="?controller=Dashboard&action=addUsuario">Registrarse</a>
    <?php } ?> 
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>