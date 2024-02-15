<?php

include_once 'model/ArticuloDAO.php';
include_once 'model/PedidoDAO.php';
include_once 'model/UsuarioDAO.php';

class PedidoController{


    //Función ver todos los pedidos desde admin
    public function listPedidos(){

        $listapedidos = PedidoDAO::getAllPedidos();
    }

    //Función ver pedidos por idUsuario
    public function verPedidos(){
       // Inicia sesión si no está iniciada
       session_start();

       // Verifica si hay un usuario 
       if (isset($_SESSION['user'])) {
          // Obtén el ID del usuario actual
           $idUsuario = $_SESSION['user']->getIdUsuarios();

           // Obtén el último pedido del usuario actual
           $ultimoPedido = PedidoDAO::getUltimoPedidoByUserId($idUsuario);

           // Verifica si se encontró un pedido
           if ($ultimoPedido) {
               // Incluye la vista para mostrar el último pedido
               include_once 'views/Carrito/verPedido.php';
           } else {
               echo "No hay pedidos para mostrar.";
           }
       } else {
           echo "No existe el usuario.";
       }
    }

  
    //Función añadir productos al carrito y guardar la cesta en variable sesion
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

        $listacategorias = CategoriaDAO::getAllCategories();
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
        
        //Declaro variable que me devolverá el metodo
        $idPedidos = PedidoDAO::add($precio_total,$idUsuario);
        // Envio a método id pedido 
        $this->addDetPedido($idPedidos);
        
        // Obtén los pedidos asociados al ID del usuario actual
        $listapedidos = PedidoDAO::getPedidosByUserId($idUsuario);

        include_once 'views/Carrito/verPedido.php';

         //una vez hecha la compra y añadido pedido a la BBDD borro la cesta
         unset($_SESSION['cesta']);
 
 
    }

    //Función eliminar productos de la cesta
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
        session_start();
        
        //si existe la cesta
        if(isset($_SESSION['cesta'])&& count($_SESSION['cesta'])>0){
            //muestro la cesta
            include_once 'views/Carrito/cesta.php';
        }
        else{
            include_once 'views/Carrito/cestaVacia.php';
            
        }
    }

    //Función añadir detalle pedido a la BBDD
    public function addDetPedido($idPedidos) {
        
        
        // Verificar si existe la cesta en la sesión y si no está vacía
        if(isset($_SESSION['cesta']) && !empty($_SESSION['cesta'])) {
            // En cada bucle enviar datos a la BBDD
            foreach ($_SESSION['cesta'] as $lineacarrito) {
                $idProducto = $lineacarrito["articulo"]->getIdProductos();
                $precio = $lineacarrito["articulo"]->getPrecio();
                $cantidad = $lineacarrito["cantidad"];
    
                // Llamar al método addDetPedido del PedidoDAO para almacenar los detalles del pedido en la base de datos
                PedidoDao::addDetPedido($idPedidos, $idProducto, $precio, $cantidad);
                // Restar stock del producto una vez se ha finalizado pedido y se han guardado los datos en la BBDD
                ArticuloDAO::restarStock($idProducto, $cantidad);

            }
        } else {

            echo "La cesta está vacía.";
        }
    }

   
    
}
