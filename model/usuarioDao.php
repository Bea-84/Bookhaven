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

    //Función que obtiene el hash de la contraseña de un usuario por su email
    public static function getPasswordHash($email){
        $con = Database::connect();

        $stmt = $con->prepare("SELECT password FROM Usuarios WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        $passwordHash = $row['password'];

       $con->close();

       return $passwordHash;
    }

    //Función que devuelve un usuario de la base de datos por su mail
    public static function  getUserBymail($email){
        $con = Database::connect();

        $stmt = $con->prepare("SELECT * FROM Usuarios WHERE email=? ");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        $usuario = $result->fetch_object('Usuario');
        $con->close();

        return $usuario;
    
    }

    //Función que añade un usuario de la base de datos
    public static function add( $nombre, $apellidos, $email, $password_hash,$direccion,$rol){
        $con = Database::connect();

        $stmt = $con->prepare("INSERT INTO Usuarios (nombre,apellidos,email,password,direccion,rol) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss" ,$nombre,$apellidos,$email,$password_hash,$direccion,$rol);
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

    // Función para editar un usuario
    public static function edit($id, $nombre, $apellidos, $email, $password, $direccion){
       $con = Database::connect();

       // Verificar si se proporcionó un nuevo password
       if (!empty($password)) {
        // Si se proporcionó un nuevo password, encriptarlo
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Actualizar el password en la base de datos solo si se proporcionó un nuevo password
        $stmt = $con->prepare("UPDATE usuarios SET nombre = ?,  apellidos = ? , email = ?,  password = ?, direccion = ? WHERE idUsuarios = ?");
        $stmt->bind_param("sssssi", $nombre, $apellidos, $email, $password_hash, $direccion, $id);
       } else {
        // No se proporcionó un nuevo password, actualizar sin cambiar el password
        $stmt = $con->prepare("UPDATE usuarios SET nombre = ?,  apellidos = ? , email = ?, direccion = ? WHERE idUsuarios = ?");
        $stmt->bind_param("ssssi", $nombre, $apellidos, $email, $direccion, $id);
       }

       $stmt->execute();
       $con->close();
    }


}

