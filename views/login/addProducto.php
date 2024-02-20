<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Añadir producto</h1>
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
        <form action="?controller=Articulo&action=add" method="post" enctype="multipart/form-data" class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                    <div class="col-sm-10">
                        <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                    <div class="col-sm-10">
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock:</label>
                    <div class="col-sm-10">
                        <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idCategoria" class="col-sm-2 col-form-label">Categoría:</label>
                    <div class="col-sm-10">
                        <select name="idCategoria" id="idCategoria" class="form-control" required>
                            <?php foreach ($listacategorias as $cat ) {?>
                                <option value="<?=$cat->getIdCategorias()?>"><?=$cat->getNombreCategoria()?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="img" class="col-sm-2 col-form-label">Foto:</label>
                    <div class="col-sm-10">
                        <input type="file" accept="image/*" name="img" id="img" class="form-control-file">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-success btn-outline-dark">Guardar</button>
            </div>
        </form>
    </section>
</div>

