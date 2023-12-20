<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
<?php include_once 'views/nav.php'; ?>

<hr >
<h5 class="text-center" >Descuento del 10% en compras superiores a 30 €</h5>
<hr>
<br>


    <div class="card mb-3 border-dark bg-dark" style="max-width: 2000px;">
        <div class="row g-0">
            <div class="col-md-4 ">
                <pre></pre>
                <img class="img-fluid rounded-start " src="img/<?= $articulo->getImg() ?>" alt="Card image cap">
                <pre></pre>
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h5 class="card-title text-white"><?= $articulo->getNombre() ?></h5>
                        <p class="text-white">Precio:</p>
                        <p class="card-text text-white"><?= $articulo->getPrecio() ?> €</p>
                        <p class="text-white">Descripción:</p>
                        <p class="card-text text-white"><?= $articulo->getDescripcion() ?></p>
                    </div>
                    <!--Botón añadir al carrito-->
                    <div class="ms-auto">
                        <form method="post" action="agregar_al_carrito.php">
                            <p class="text-white">Cantidad:</p>
                            <input type="number" name="cantidad" value="1" min="1" max="10">
                            <input type="hidden" name="idProducto" value="<?= $articulo->getIdProductos() ?>">
                            <button class="btn btn-outline-success btn-outline-light" type="submit" name="accion" value="anadir">Añadir al carrito</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
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