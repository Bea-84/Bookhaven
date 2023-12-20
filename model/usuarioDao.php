<?php

include_once 'config/database.php';
include_once 'Usuario.php';

class UsuarioDao{

    //Función que devuelve todos los usuarios de la base de datos
    public static function getAllUsuarios(){

        $con = Database::connect();

        $stmt = $con->prepare("SELECT * FROM Usuarios");
        $stmt->execute();
        $result = $stmt->get_result();

        $listaUsuarios = [];

        while($usuario=$result->fetch_object('Usuario')){
            $listaUsuarios[] = $usuario;
        }
        $con->close();

        return $listaUsuarios;
    }

    //Función que devuelve un usuario de la base de datos
    public static function  verificaLogin($email,$password){
        $con = Database::connect();

        $stmt = $con->prepare("SELECT * FROM Usuarios WHERE email=? AND password=?");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $result = $stmt->get_result();

        $usuario = $result->fetch_object('Usuario');
        $con->close();

        return $usuario;
    
    }

    //Función que añade un usuario de la base de datos
    public static function add( $nombre, $apellidos, $email, $password,$direccion){
        $con = Database::connect();

        $stmt = $con->prepare("INSERT INTO Usuarios (nombre,apellidos,email,password,direccion) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss" ,$nombre,$apellidos,$email,$password,$direccion);
        $stmt->execute();

        
        $con->close();
      
    }

    //Función que elimina un usuario de la base de datos
    public static function delete($idUsuarios){
        $con = Database::connect();

        $stmt = $con->prepare("DELETE FROM Usuarios WHERE idUsuarios=?");
        $stmt->bind_param("i" ,$idUsuarios);
        $stmt->execute();

        $con->close();
    
    }

    //Función para conseguir usuario por su Id
    public static function getUserById($idUsuarios){
        $con=Database::connect();
        $stmt=$con->prepare("SELECT * FROM usuarios WHERE idUsuarios = ?");
        $stmt->bind_param("i",$idUsuarios);
        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_object('usuario');
       
        $con->close();

        return $user;
    }

    //Función para editar un usuario
    public static function edit($id,$nombre,$apellidos,$email,$password,$direccion){
        $con=Database::connect();
        $stmt = $con->prepare("UPDATE usuarios SET nombre = ?,  apellidos = ? , email = ?,  password = ?, direccion = ? WHERE idUsuarios = ?");
        $stmt->bind_param("sssssi",$nombre,$apellidos,$email,$password,$direccion,$id);
        $stmt->execute();
        $con->close();

    }

}

