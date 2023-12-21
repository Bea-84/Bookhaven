<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Añadir Usuario</h1>
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

    <form action="?controller=Usuario&action=add" method="post">
        Nombre:
        <br>
        <input type="text" name="nombre" placeholder="Nombre" required />
        <br>
        Apellidos:
        <br>
        <input type="text" name="apellidos" placeholder="apellido"required />
        <br>
        Email:
        <br>
        <input type="text" name="email" placeholder="email" required/>
        <br>
        Password:
        <br>
        <input type="password" name="password" placeholder="password" required/>
        <br>
        Dirección:
        <br>
        <input type="text" name="direccion" placeholder="direccion" required/>
        <br>
       <pre></pre>
        <button type="submit">Guardar</button>
    </form>
    </section>
</div>