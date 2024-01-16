<?php

include_once 'model/ArticuloDAO.php';
include_once 'model/PedidoDAO.php';
include_once 'model/UsuarioDAO.php';

class PedidoController{


    //Función ver pedidos
    public function verPedidos(){
        $listapedidos = pedidoDao::getAllPedidos();
        include_once 'views/Carrito/verPedido.php';
    
    }
  
    //Función añadir producto al carrito y guardar cesta variable sesion
    public function addCarrito(){

        $listacategorias = CategoriaDAO::getAllCategories();
        
        //recibo el id de un producto y la cantidad 
        $id = $_POST['idProducto'];
        $articulo = ArticuloDAO::getArticuloById($id);
        
        //inicio sesión
        session_start();
        
        //si no existe la cesta la creo
        if(!isset($_SESSION['cesta'])){
            $_SESSION['cesta'] = array();
        }

        // Añadir producto,cantidad,precio y precio total a la cesta
        $_SESSION['cesta'][] = array(
            'articulo' => $articulo,
            'cantidad' => $_POST['cantidad'],
            'precio' => $articulo->getPrecio(),
            'total' => $articulo->getPrecio() * $_POST['cantidad'],
        );

        include_once 'views/Carrito/cesta.php';
        

    }

    //Función añadir pedido a la BBDD
    public function addPedido(){

        //si existe una sesion cesta y usuario
        session_start();

        //si existe la cesta y el usuario hago foreach para recoger total cesta
        $total = 0;  
        foreach ($_SESSION['cesta'] as $lineacarrito) {
        $total += $lineacarrito["articulo"]->getPrecio() * $lineacarrito['cantidad'];
        };
        //paso a BBDD precio total cesta 
        $precio_total = $total;

        //en la sesion tengo un usuario guardado necesito conseguir id y lo haré a través del método de la clase
        $idUsuario=$_SESSION['user']->getIdUsuarios();
        
        pedidoDao::add($precio_total,$idUsuario);

        include_once 'views/Carrito/verPedido.php';
 
 
    }

    //Función eliminar producto de la cesta
    public function deleteProducto(){
       //si existe sesion cesta y recibo id del producto a eliminar
        session_start();

        //recibo id del producto a eliminar
        $id = $_GET['idProducto'];
        //recorro la cesta y si coincide con el id del producto lo borro
        //$indice es xq linea carrito es una array
        foreach ($_SESSION['cesta'] as $indice =>  $lineacarrito) {
            if($lineacarrito['articulo']->getIdProductos() == $id){
                unset($_SESSION['cesta'][$indice]);
            }
        
        }
        //vuelvo a mostrar la cesta
        include_once 'views/Carrito/cesta.php';
           
        
    }

    //Función ver cesta
    public function verCesta(){

        $view= 'views/Carrito/cesta.php';
        include_once 'views/Carrito/cesta.php';

    }



   
}