<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
 <?php
 //no me devuelve nada xq $pedido es una variable indefinidas
 var_dump($pedido);
 ?>
<div class="card mb-3 border-dark bg-dark" style="max-width: 2000px;">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <p class="text-white">Id Pedido:</p>
                        <p class="card-title text-white"><?= $pedido->getidPedidos() ?></p>
                        <p class="text-white">Total:</p>
                        <p class="card-title text-white"><?= $pedido->getprecio_total() ?></p>
                        <p class="text-white">Fecha pedido:</p>
                        <p class="card-text text-white"><?= $pedido->getfecha_compra() ?> €</p>
                        <p class="text-white">Id Usuario:</p>
                        <p class="card-text text-white"><?= $pedido->getidUsuarios() ?></p>
                    </div>
                    <!--Botón volver tienda-->
                    <div >
                    <a class="btn btn-dark" href="?controller=Articulo">Volver a la tienda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>