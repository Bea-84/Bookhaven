<?php

include_once 'config/database.php';
include_once 'pedido.php';

class PedidoDao{

    //Función añade pedido a la base de datos
    public static function add($precio_total,$idUsuario){
       $conn = Database::connect();

       $stmt = $conn->prepare("INSERT INTO pedidos (precio_total,idUsuario)VALUES(?,?)");
       $stmt->bind_param("di",$precio_total,$idUsuario);
       $stmt->execute();
       $stmt->close();
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


    
}