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
            <h2>Pedido Realizado con éxito, esperamos verle pronto</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                    <tr>
                        <!-- Cabecera tabla -->
                        <th class="text-center py-3 px-4" style="width: 100px;">Numero pedido:</th>
                        <th class="text-center py-3 px-4" style="width: 100px;">Precio total:</th>
                        <th class="text-center py-3 px-4" style="width: 100px;">Fecha pedido:</th>
                        <th class="text-center py-3 px-4" style="width: 100px;">Numero Usuario</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Verifica si hay al menos un pedido
                    if (!empty($listapedidos)) {
                        // Obtén el último pedido
                        $ultimoPedido = end($listapedidos);
                        ?>
                        <tr>
                            <td><?= $ultimoPedido->getidPedidos() ?></td>
                            <td><?= $ultimoPedido->getprecio_total() ?>€</td>
                            <td><?= $ultimoPedido->getfecha_compra() ?></td>
                            <td><?= $ultimoPedido->getidUsuario() ?></td>
                        </tr>
                    <?php
                    } else {
                        echo "<tr><td colspan='4'>No hay pedidos para mostrar.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <pre></pre>
            <!-- Botón volver tienda -->
            <div>
                <a class="btn btn-dark" href="?controller=Articulo">Volver a la tienda</a>
            </div>
        </div>
    </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
