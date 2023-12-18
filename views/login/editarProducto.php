
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

    <form action="?controller=Articulo&action=edit" method="post">
        <input type="number" name="id" value="<?=$producto->getIdProductos()?>" required hidden/>
        <br>
        Nombre:
        <br>
        <input type="text" name="nombre" placeholder="Nombre" value="<?=$producto->getNombre()?>"  required/>
        <br>
        Precio:
        <br>
        <input type="number" name="precio" placeholder="Precio" value="<?=$producto->getPrecio()?>" required/>
        <br>
        Descripción:
        <br>
        <input  name="descripcion" placeholder="Descripción" value="<?=$producto->getDescripcion()?>" required/>
        <br>
        Categoria:
        <br>
        <select name="idCategoria">
            <?php foreach ($listacategorias as $cat ) {?>
                <option value="<?=$cat->getIdCategorias()?>"
                <?php if($cat->getIdCategorias()==$producto->getIdCategoria()) echo "selected";?> 
                
                ><?=$cat->getNombreCategoria()?></option>
            <?php }?>
        </select>
        <pre></pre>
        <button type="submit">Guardar</button>
    </form>
    </section>

    