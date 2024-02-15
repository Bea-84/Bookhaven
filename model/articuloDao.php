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
    public static function add( $nombre, $precio, $descripcion, $idCategoria,$stock,$img){
        $con=Database::connect();
        $stmt = $con->prepare("INSERT INTO productos (nombre, precio, descripcion,idCategoria,img,stock) VALUES ( ?, ?, ?,?,?,?)");
        $stmt->bind_param("sssisi", $nombre, $precio, $descripcion, $idCategoria,$img,$stock);
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

    //Función restar stock
    public static function restarStock($idProductos, $cantidad){
       $con = Database::connect();
       // Primero, obtener el stock actual del producto
       $stmt = $con->prepare("SELECT stock FROM productos WHERE idProductos = ?");
       $stmt->bind_param("i", $idProductos);
       $stmt->execute();
       $stmt->bind_result($stock_actual);
       $stmt->fetch();
       $stmt->close();

       // Restar la cantidad comprada del stock actual
       $nuevo_stock = $stock_actual - $cantidad;

       // Actualizar el stock en la base de datos
       $stmt = $con->prepare("UPDATE productos SET stock = ? WHERE idProductos = ?");
       $stmt->bind_param("ii", $nuevo_stock, $idProductos);
       $stmt->execute();
       $stmt->close();

       $con->close();
    }

    //Función consulta con la BBDD la palabra introducida por usuario
    public static function search($search){
       //Conecto con la BBDD
       $con = Database::connect();
       //Preparo la consulta
       $stmt = $con->prepare("SELECT * FROM productos WHERE nombre LIKE ?");
       $search = "%$search%";
       $stmt->bind_param("s", $search);
       $stmt->execute();
       $result = $stmt->get_result();
       $listaarticulos = [];
       while ($articulo = $result->fetch_object('Articulo')) {
           $listaarticulos[] = $articulo;
       }
       $con->close();
       return $listaarticulos;
       }
    
    

    
    
}
