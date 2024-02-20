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
        <form action="?controller=Usuario&action=edit" method="post" class="card">
            <div class="card-body">
                <input type="hidden" name="id" value="<?=$user->getIdUsuarios()?>" required>
                <div class="form-group">
                    <label for="nombre">Nombre usuario:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre usuario" value="<?=$user->getNombre()?>" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" value="<?=$user->getApellidos()?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?=$user->getEmail()?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?=$user->getPassword()?>" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="<?=$user->getDireccion()?>" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-success btn-outline-dark">Guardar</button>
            </div>
        </form>
    </section>
</div>
