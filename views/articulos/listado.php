<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bookhaven</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>

<?php include_once 'views/nav.php'; ?>
<?php include_once 'views/header.php'; ?>

<div class="text-center">
    <h2>PRODUCTOS</h2>
</div>

<pre></pre>

<div class="row">
    <?php
    foreach ($listaarticulos as $articulo) {
    ?>
        <div class="card-p col-3 mb-4 ms-4 me-4 border-dark bg-dark" style="width: 20rem;">
            <img class="card-img-top " src="img/<?= $articulo->getImg() ?>" alt="Card image cap">
            <div class="card-body">
                <pre></pre>
            <p class="text-white">Nombre:</p>
                <h5 class="card-title text-white"><?= $articulo->getNombre() ?></h5>
                <pre></pre>
                <p class="text-white">Descripción:</p>
                <p class="card-text text-white"><?= $articulo->getDescripcion() ?></p>
                <p class="text-white">Precio:</p>
                <p class="card-text text-white"><?= $articulo->getPrecio() ?> €</p>

                <!-- Botones de ver producto y añadir al carrito  -->
                <button class="btn btn-outline-success btn-outline-light" type="button" onclick="location.href='?controller=Articulo&action=listProductoxId&id=<?= $articulo->getIdProductos() ?>'">Ver producto</button>
                <pre></pre>
                <button class="btn btn-outline-success btn-outline-light" type="button">Añadir al carrito</button>
            </div>
            <pre></pre>
        </div>
        
    <?php } ?>
    
</div>

<?php include_once 'views/Testimonials.php'; ?>
<?php include_once 'views/footer.php'; ?>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('.carousel').carousel();
</script>

</body>
</html>