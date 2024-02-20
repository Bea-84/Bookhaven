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

        <form action="?controller=Usuario&action=add" method="post" class="form-horizontal">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
                        <div class="col-sm-10">
                            <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                        <div class="col-sm-10">
                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rol" class="col-sm-2 col-form-label">Rol:</label>
                        <div class="col-sm-10">
                            <select name="rol" id="rol" class="form-control" required>
                                <option value="usuario">Usuario</option>
                                <option value="administrador">Administrador</option>
                                <!-- Puedes agregar más roles según tus necesidades -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success btn-outline-dark">Guardar</button>
                </div>
            </div>
        </form>

    </section>
</div>
