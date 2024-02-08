<?php

include_once 'config/database.php';
include_once 'pedido.php';

class PedidoDAO{

    //Función para conseguir todos los pedidos
    public static function getAllPedidos(){
      $con = Database::connect();

        $stmt = $con->prepare("SELECT * FROM pedidos");
        $stmt->execute();
        $result = $stmt->get_result();

        $listapedidos = [];

        while ($pedido = $result->fetch_object('Pedido')) {
          $listapedidos[] = $pedido;
        }
        $con->close();

        return $listapedidos;
    }
    
    //Función añade pedido a la base de datos
    public static function add($precio_total,$idUsuario){
       $conn = Database::connect();

       $stmt = $conn->prepare("INSERT INTO pedidos (precio_total,idUsuario)VALUES(?,?)");
       $stmt->bind_param("di",$precio_total,$idUsuario);
       $stmt->execute();
       // Obtener el ID del pedido generado
       $idPedido = $stmt->insert_id;
       
       $stmt->close();

       return $idPedido;
    }

    //Función buscar pedidos por id usuario
    public static function getPedidosByUserId($idUsuario){
      $con = Database::connect();
      $stmt = $con->prepare("SELECT * FROM pedidos WHERE idUsuario = ?");
      $stmt->bind_param("i", $idUsuario);
      $stmt->execute();
      $result = $stmt->get_result();

      $pedidos = array();

      while ($pedido = $result->fetch_object('pedido')) {
          $pedidos[] = $pedido;
      }

      $con->close();

      return $pedidos;
    }

    //Función añadir detalle pedido a la BBDD
    public static function addDetPedido($idPedido,$idProducto,$precio,$cantidad){
      $con = Database::connect();
      $stmt = $con->prepare("INSERT INTO pedidos_has_productos (Pedidos_idPedidos,Productos_idProductos,precio,cantidad)VALUES(?,?,?,?) ");
      $stmt->bind_param("iidi",$idPedido,$idProducto,$precio,$cantidad);
      $stmt->execute();
      $stmt->close();
    }


    
}