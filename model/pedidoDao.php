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

    //Función para conseguir todos los pedidos de la base de datos
    public static function getAllPedidos(){
        $conn = Database::connect();

        $stmt = $conn->prepare("SELECT * FROM pedidos");
        $stmt->execute();
        $result = $stmt->get_result();
        
        $listaPedidos = [];
        while($pedido = $result->fetch_object('pedido')){
            $listaPedidos[] = $pedido;
        }
        $stmt->close();
        return $listaPedidos;
    
    }
    
}