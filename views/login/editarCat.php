<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar categoria</h1>
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

    <form action="?controller=Categoria&action=edit" method="post">
        <input type="number" name="id" value="<?=$categoria->getIdCategorias()?>" required hidden/>
        <br>
        Nombre categoria:
        <br>
        <input type="text" name="nombre" placeholder="Nombre categoria" value="<?=$categoria->getNombreCategoria()?>"  required/>
        <br>
        Descripción:
        <br>
        <input type="text" name="descripcion" placeholder="Descripción" value="<?=$categoria->getDescripcion()?>" required/>
        <br>
        <pre></pre>
        <button type="submit">Guardar</button>
    </form>
    </section>