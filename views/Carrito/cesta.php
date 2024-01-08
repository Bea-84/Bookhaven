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

var_dump($_SESSION['cesta']);
$total = 0;  // Inicializar el total fuera del bucle
foreach ($_SESSION['cesta'] as $lineaCarrito) {
    $total += $lineaCarrito->getPrecio() * $lineaCarrito->$_POST['cantidad'];
?>
    <div class="row g-0">
        <div class="col-md-4 ">
            <pre></pre>
            <img class="img-fluid rounded-start" src="img/<?= $lineaCarrito['articulo']->getImg() ?>" alt="Card image cap">
            <pre></pre>
        </div>
        <div class="col-md-8">
            <div class="card-body d-flex align-items-center">
                <div>
                    <p class="card-title text-white">Nombre: <?= $lineaCarrito['articulo']->getNombre() ?></p>
                    <p class="card-text text-white">Precio: <?= $lineaCarrito['articulo']->getPrecio() ?> €</p>
                    <p class="card-text text-white">Cantidad: <?= $lineaCarrito['cantidad'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</div>

<div>
    <p class="text-black">Total: <?= $total ?> €</p>
    <button class="btn btn-outline-success btn-outline-light">Comprar</button>
    <button class="btn btn-outline-success btn-outline-light">Cancelar</button>
    <button class="btn btn-outline-success btn-outline-light">Volver a la tienda</button>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>