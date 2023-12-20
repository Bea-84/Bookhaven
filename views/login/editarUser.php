<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?controller=Usuario">Home</a></li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

    <form action="?controller=Usuario&action=edit" method="post">
        <input type="number" name="id" value="<?=$user->getIdUsuarios()?>" required hidden/>
        <br>
        Nombre usuario:
        <br>
        <input type="text" name="nombre" placeholder="Nombre usuario" value="<?=$user->getNombre()?>"  required/>
        <br>
        Apellidos:
        <br>
        <input type="text" name="apellidos" placeholder="apellidos" value="<?=$user->getApellidos()?>" required/>
        <br>
        Email:
        <br>
        <input type="text" name="email" placeholder="email" value="<?=$user->getEmail()?>"  required/>
        <br>
        Password:
        <br>
        <input type="text" name="password" placeholder="password" value="<?=$user->getPassword()?>" required/>
        <br>
        Dirección:
        <br>
        <input type="text" name="direccion" placeholder="direccion" value="<?=$user->getDireccion()?>" required/>
        <br>
        <pre></pre>
        <button type="submit">Guardar</button>
    </form>
    </section>