<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar producto</h1>
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
        <form action="?controller=Articulo&action=edit" method="post" enctype="multipart/form-data" class="card">
            <div class="card-body">
                <input type="hidden" name="id" value="<?=$producto->getIdProductos()?>" required>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="<?=$producto->getNombre()?>" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio" value="<?=$producto->getPrecio()?>" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" value="<?=$producto->getDescripcion()?>" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock" value="<?=$producto->getStock()?>" required>
                </div>
                <div class="form-group">
                    <label for="idCategoria">Categoría:</label>
                    <select name="idCategoria" id="idCategoria" class="form-control">
                        <?php foreach ($listacategorias as $cat ) {?>
                            <option value="<?=$cat->getIdCategorias()?>" <?php if($cat->getIdCategorias() == $producto->getIdCategoria()) echo "selected"; ?>>
                                <?=$cat->getNombreCategoria()?>
                            </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="img">Imagen:</label>
                    <input type="file" accept="image/*" name="img" id="img" class="form-control-file">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-success btn-outline-dark">Guardar</button>
            </div>
        </form>
    </section>
</div>



    