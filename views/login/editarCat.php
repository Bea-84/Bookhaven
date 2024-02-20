<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar categoría</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?controller=Categoria">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <form action="?controller=Categoria&action=edit" method="post" class="card">
            <div class="card-body">
                <input type="hidden" name="id" value="<?=$categoria->getIdCategorias()?>" required>
                <div class="form-group">
                    <label for="nombre">Nombre categoría:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre categoría" value="<?=$categoria->getNombreCategoria()?>" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" value="<?=$categoria->getDescripcion()?>" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-success btn-outline-dark">Guardar</button>
            </div>
        </form>
    </section>
</div>
