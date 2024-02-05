<?php

include_once 'config/database.php';
include_once 'articulo.php';

class ArticuloDAO
{

    //Función conseguir todos los productos
    public static function getAllArticulos()
    {

        $con = Database::connect();
        $stmt = $con->prepare("SELECT * FROM productos");
        $stmt->execute();
        $result = $stmt->get_result();
        $listaarticulos = [];
        while ($articulo = $result->fetch_object('Articulo')) {
            $listaarticulos[] = $articulo;
        }
        $con->close();

        return $listaarticulos;
    }

    //Función conseguir un producto por su id
    public static function getArticuloById($idProductos){
        $con = Database::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE idProductos = ?");
        $stmt->bind_param("i", $idProductos);
        $stmt->execute();

        $result = $stmt->get_result();

        $articulo = $result->fetch_object('Articulo');
       
        $con->close();

        return $articulo;
    }

    //Función conseguir un producto por su id de categoria
    public static function listProductosxId($idCategoria){
        $con=Database::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE idcategoria = ?");
        $stmt->bind_param("i", $idCategoria);
        $stmt->execute();

        $result = $stmt->get_result();

        $listaarticulos = [];

        while ($articulo = $result->fetch_object('Articulo')) {
            $listaarticulos[] = $articulo;
        }
        $con->close();

        return $listaarticulos;
    }

    //Función añadir producto
    public static function add( $nombre, $precio, $descripcion, $idCategoria,$stock){
        $con=Database::connect();
        $stmt = $con->prepare("INSERT INTO productos (nombre, precio, descripcion,idCategoria,stock) VALUES ( ?, ?, ?,?,?)");
        $stmt->bind_param("sssii", $nombre, $precio, $descripcion, $idCategoria,$stock);
        $stmt->execute();
        $con->close();
    }
     

    //Función eliminar producto
    public static function delete($idProductos){
        $con=Database::connect();
        $stmt = $con->prepare("DELETE FROM productos WHERE idProductos = ?");
        $stmt->bind_param("i", $idProductos);
        $stmt->execute();
        $con->close();
    }

    //Función editar producto
    public static function edit( $id,$nombre, $precio, $descripcion,$stock,$idCategoria){
        $con=Database::connect();
        $stmt = $con->prepare("UPDATE productos SET nombre = ?, precio = ?, descripcion = ?, idCategoria = ?, stock = ? WHERE idProductos = ?");
        $stmt->bind_param("sdsiii", $nombre, $precio, $descripcion, $idCategoria,$stock,$id);
        $stmt->execute();
        $con->close();
    
    }

    //Función consultar stock
    public static function consultaStock($idProductos){
        $con=Database::connect();
        $stmt = $con->prepare("SELECT stock FROM productos WHERE idProductos = ?");
        $stmt->bind_param("i", $idProductos);
        $stmt->execute();

        $result = $stmt->get_result();

        $articulo = $result->fetch_object('Articulo');
       
        $con->close();

        return $articulo;
    
    }

    
}
