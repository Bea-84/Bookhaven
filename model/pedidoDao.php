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
    
}