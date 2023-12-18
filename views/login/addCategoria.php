<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Añadir categoria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?controller=Dashboard">Home</a></li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

    <form action="?controller=Categoria&action=add" method="post">
        Nombre categoria:
        <br>
        <input type="text" name="nombreCategoria" placeholder="Nombre categoria" require/>
        <br>
        Descripción:
        <br>
        <input type="text" name="descripcion" placeholder="Descripcion" require/>
        <br>
        <pre></pre>
       
        <button type="submit">Guardar</button>
    </form>
    </section>
</div>

