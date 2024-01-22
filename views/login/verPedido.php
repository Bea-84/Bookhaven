<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver pedidos</title>
</head>
<body>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ver pedidos</h1>
                </div>
                
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?controller=Articulo">Home</a></li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">

        <table class="table table-bordered">
            <thead  class="thead-dark">
                <tr>
                   
                    <th>Id Pedido</th>
                    <th>Precio total</th>
                    <th>Fecha de compra</th>
                    <th>Id usuario</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listapedidos as $pedido) {
            ?>
                <tr>
                    <td><?= $pedido->getidPedidos() ?></td>
                    <td><?= $pedido->getprecio_total() ?></td>
                    <td><?= $pedido->getfecha_compra() ?></td>
                    <td><?= $pedido->getidUsuario() ?></td>
                    <td>  <a href="" class="nav-link">
                            <i class="fa-solid fa-trash"></i>
                                <p>Eliminar pedido</p>
                            </a>
                            <a href="" class="nav-link">
                            <i class="fa-solid fa-pencil"></i>
                                <p>Editar pedido</p>
                            </a>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </section>
</div>
    
</body>
</html>