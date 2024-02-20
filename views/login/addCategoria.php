<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Añadir categoría</h1>
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
        <form action="?controller=Categoria&action=add" method="post" class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="nombreCategoria">Nombre categoría:</label>
                    <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control" placeholder="Nombre categoría" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-success btn-outline-dark">Guardar</button>
            </div>
        </form>
    </section>
</div>


