<?php

include_once 'model/ArticuloDAO.php';
include_once 'model/PedidoDAO.php';

class PedidoController{

  
    //Función añadir producto al carrito
    public function addCarrito(){
        
        //recibo el id de un producto y la cantidad 
        $id = $_POST['idProducto'];
        $articulo = ArticuloDAO::getArticuloById($id);

        //inicio sesión
        session_start();

        //si no existe la cesta la creo
        if(!isset($_SESSION['cesta'])){
            $_SESSION['cesta'] = array();
        }

          // Añadir producto a la cesta
          $_SESSION['cesta'][] = array(
            'articulo' => $articulo,
            'cantidad' => $_POST['cantidad'],
            
        );

        include_once 'views/Carrito/cesta.php';

        
    
    }
}