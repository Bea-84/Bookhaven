
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ver categorias</h1>
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
                    <th>Nombre categoria</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                    
                    
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listacategorias as $categoria) {
                ?>
                <tr>
                    <td><?= $categoria->getNombreCategoria() ?></td>
                    <td><?= $categoria->getDescripcion() ?></td>
                    <td>   <a href="?controller=Categoria&action=delete&id=<?= $categoria->getIdCategorias() ?>" class="nav-link">
                            <i class="fa-solid fa-trash"></i>
                                <p>Eliminar categorias</p>
                            </a>
                            <a href="?controller=Dashboard&action=editCat&id=<?= $categoria->getIdCategorias() ?>" class="nav-link">
                            <i class="fa-solid fa-pencil"></i>
                                <p>Editar categorias</p>
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