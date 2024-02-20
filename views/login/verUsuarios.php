
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ver usuarios</h1>
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

        <table class="table table-bordered">
            <thead  class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Direccion</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listaUsuarios as $usuario) {
                ?>
                <tr>
                    <td><?= $usuario->getNombre() ?></td>
                    <td><?= $usuario->getApellidos() ?></td>
                    <td><?= $usuario->getEmail() ?></td>
                    <td><?= $usuario->getPassword() ?></td>
                    <td><?= $usuario->getDireccion() ?></td>
                    <td><?= $usuario->getRol() ?></td>
                    <td> <a href="?controller=Usuario&action=delete&id=<?= $usuario->getIdUsuarios() ?>"class="nav-link">
                            <i class="fa-solid fa-trash"></i>
                                <p>Eliminar Usuario</p>
                            </a>
                            <a href="?controller=Dashboard&action=editUser&id=<?= $usuario->getIdUsuarios() ?>" class="nav-link">
                            <i class="fa-solid fa-pencil"></i>
                                <p>Editar Usuarios</p>
                            </a>
                        </td>

                   
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </section>
</div>
    
</body>
</html>