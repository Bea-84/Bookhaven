<?php


include_once 'model/usuarioDao.php';

class UsuarioController {

    //funcion listar usuarios
    public function listUsuarios(){

        $listaUsuarios=UsuarioDAO::getAllUsuarios();
        include_once 'views/usuarios/listadoUsers.php';
      
    }
    
    //funcion agregar usuario
    public function add(){
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $direccion=$_POST['direccion'];
        $rol = $_POST['rol']; // Nuevo campo para el rol

        // Verificar si el correo electrónico ya existe en la base de datos
        if(UsuarioDAO::emailExists($email)) {
           // Si el correo electrónico ya existe, muestra un mensaje de alerta al usuario
           echo '<script>alert("El correo electrónico ya está registrado. Por favor, intente con otro correo electrónico."); 
           window.location.href = "?controller=Dashboard&action=addNuevoUsuario";</script>';
           exit; // Detener la ejecución del script
        }

        //encripto password y lo guardo en nueva variable 
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        usuarioDAO::add($nombre,$apellidos,$email,$password_hash,$direccion,$rol);

        //Una vez registrado el nuevo usuario en la BBDD te redirigirá al método verifica login
        $this->verificaLogin($email,$password);

        //header("Location:".url."?controller=Dashboard&action=addUsuario");
    }
    
    //funcion dirige al area login
    public function login(){
        include_once 'views/login/areaLogin.php';
    }
    
    //funcion verifica login
    public function verificaLogin(){

          //recibo un mail y un password
          $email = $_POST['email'];
          $password = $_POST['password'];

         // Obtener el hash almacenado en la base de datos a través del mail de usuario
         $storedHash = UsuarioDAO::getPasswordHash($email);
        
        // Verificar la contraseña usando password_verify
        if (password_verify($password, $storedHash)) {
            // La contraseña es correcta
            //busco en la BBDD al usuario a través del mail
            $user = usuarioDAO::getUserBymail($email);
                 if ($user) {
                 //si usuario existe inicio session
                 session_start();
                 $_SESSION['user'] = $user; // Guardar el usuario en la sesión
                 if ($user->getRol() == 'administrador') {
                 //si está registrado como admin redirecciono a panel admin
                 header("Location:" . url . "?controller=Dashboard&action=listUsuarios");
                 } elseif ($user->getRol() == 'usuario') {
                 //si está registrado como user redirecciono a tienda
                 header("Location:" . url . "?controller=Articulo");
                 } 
                           }  
        } else {
            // no está registrado, te vuelve a arealogin.php para que introduzcas los datos bien o te registres seleccionando la opción ya existente
           header("Location: " . url . "?controller=usuario&action=login");
              
        }
    }


    //función cerrar session
    public function logout(){
        session_start();
        session_destroy();
        header("Location:".url."?controller=Articulo");
    
    }


    //funcion eliminar usuario
    public function delete(){
        $id=$_GET['id'];
        usuarioDAO::delete($id);
        header("Location:".url."?controller=Dashboard&action=listUsuarios");
    }

    //Función para editar usuario
    public function edit(){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $direccion=$_POST['direccion'];

        usuarioDAO::edit($id,$nombre,$apellidos,$email,$password,$direccion);
        header("Location:".url."?controller=Dashboard&action=listUsuarios");
    }
    


}