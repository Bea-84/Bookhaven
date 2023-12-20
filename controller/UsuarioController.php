<?php

include_once 'model/UsuarioDao.php';

class UsuarioController {

    //funcion listar usuarios
    public function listUsuarios(){

        $listaUsuarios=UsuarioDao::getAllUsuarios();
        include_once 'views/usuarios/listadoUsers.php';
      
    }
    //funcion agregar usuario
    public function add(){
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $direccion=$_POST['direccion'];

        usuarioDao::add($nombre,$apellidos,$email,$password,$direccion);

        header("Location:".url."?controller=Dashboard&action=addUsuario");
    }
    
    //funcion dirige al area login
    public function login(){
        include_once 'views/login/areaLogin.php';
    }
    
    //funcion verifica login
    public function verificaLogin(){

       $email=$_POST['email'];
       $password=$_POST['password'];
       $user = usuarioDao::verificaLogin($email,$password);
    
       if($user){
          session_start();
          $_SESSION['user'] = $user;
        if( $user->getRol() == 'administrador' ){
            header("Location:".url."?controller=Dashboard&action=listUsuarios");
        }
        else {
            header("Location:".url."?controller=Articulo");
        }
    
        } else {
        header("Location:".url."?controller=Dashboard&action=addUsuario");
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
        usuarioDao::delete($id);
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

        usuarioDao::edit($id,$nombre,$apellidos,$email,$password,$direccion);
        header("Location:".url."?controller=Dashboard&action=listUsuarios");
    }
    


}