<?php

include_once 'model/UsuarioDAO.php';

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

        usuarioDAO::add($nombre,$apellidos,$email,$password,$direccion,$rol);

        header("Location:".url."?controller=Dashboard&action=addUsuario");
    }
    
    //funcion dirige al area login
    public function login(){
        include_once 'views/login/areaLogin.php';
    }
    
    //funcion verifica login
    public function verificaLogin(){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = usuarioDAO::verificaLogin($email, $password);
    
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
    
            if ($user->getRol() == 'administrador') {
                // si está registrado  y es admin, lleva a la zona de administrador
                header("Location: " . url . "?controller=Dashboard&action=listUsuarios");
                exit();
            } elseif ($user->getRol() == 'usuario') {
                // si está registrado y no es admin, te lleva a la tienda
                header("Location: " . url . "?controller=Articulo");
                exit();
            } elseif ($user->getRol() == 'usuario' && isset($_SESSION['cesta'])) {
                // si está registrado, no es admin y hay una sesión con la cesta, te lleva a mi cesta
                header("Location: " . url . "?controller=Pedido&action=addCarrito");
                exit();
            }
        } elseif (isset($_SESSION['cesta']))  {
            //no esta registrado pero existe una sesion con la cesta y se acaba de registrar como usuario te llevará a cesta
            header("Location: " . url . "?controller=Pedido&action=addCarrito");
            exit();
        }
        else {
            // no está registrado, te lleva a la zona de administrador para añadir usuario
            header("Location: " . url . "?controller=Dashboard&action=addUsuario");
            exit();

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