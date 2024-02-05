<?php

include_once 'config/database.php';
include_once 'categoria.php';

class CategoriaDAO {

    //Función que devuelve todas las categorías de la base de datos
    public static function getAllCategories(){
        $con = Database::connect();
        $stmt = $con->prepare("SELECT * FROM categorias");
        $stmt->execute();
        $result = $stmt->get_result();
        $listacategorias = [];

        while ($categoria = $result->fetch_object('Categoria')) {
                      $listacategorias[] = $categoria;
        }

        $con->close();
        
        return $listacategorias;
    }

    //Función añadir categoría a la base de datos. 
    public static function add($nombreCategoria,$descripcion){
        $con=Database::connect();
        $stmt=$con->prepare("INSERT INTO categorias (nombreCategoria,descripcion) VALUES (?,?)");
        $stmt->bind_param("ss",$nombreCategoria,$descripcion);
        $stmt->execute();
        $stmt->close();
    }

    //Función que elimina una categoría según su id
    public static function delete($idCategorias){
        $con=Database::connect();
        $stmt=$con->prepare("DELETE FROM categorias WHERE idCategorias=?");
        $stmt->bind_param("i",$idCategorias);
        $stmt->execute();
        $stmt->close();
    
    }
    //Función para conseguir categoria x su id
    public static function getCatById($idCategorias){
        $con=Database::connect();
        $stmt=$con->prepare("SELECT * FROM categorias WHERE idCategorias = ?");
        $stmt->bind_param("i",$idCategorias);
        $stmt->execute();
        $result = $stmt->get_result();

        $categoria = $result->fetch_object('Categoria');
       
        $con->close();

        return $categoria;
    }

    //función para editar un producto
    public static function edit($idCategorias,$nombreCategoria,$descripcion){
        $con=Database::connect();
        $stmt = $con->prepare("UPDATE categorias SET nombreCategoria = ?,  descripcion = ? WHERE idCategorias = ?");
        $stmt->bind_param("ssi", $nombreCategoria, $descripcion, $idCategorias);
        $stmt->execute();
        $con->close();
    }

    
}