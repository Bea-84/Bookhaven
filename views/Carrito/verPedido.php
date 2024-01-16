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

<?php include_once 'views/nav.php'; ?>

    <div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Mis pedidos</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Cabecera tabla -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Numero pedido:</th>
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Precio total:</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Fecha pedido:</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Numero Usuario</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php
    foreach($listapedidos as $pedido)
    {
        ?>
          <tr>
                   
                    <td><?= $pedido->getidPedidos() ?></td>
                    <td><?= $pedido->getprecio_total() ?>€</td>
                    <td><?= $pedido->getfecha_compra() ?></td>
                    <td><?= $pedido->getidUsuario() ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
              </table>
            </div>
            <pre></pre>
              <!--Botón volver tienda-->
              <div>
                    <a class="btn btn-dark" href="?controller=Articulo">Volver a la tienda</a>
                </div>


   



<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>