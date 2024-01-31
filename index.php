<?php


include_once 'config/parameters.php';
include_once 'controller/ArticuloController.php';
include_once 'controller/UsuarioController.php';
include_once 'controller/CategoriaController.php';
include_once 'controller/DashboardController.php';
include_once 'controller/PedidoController.php';



    //Se verifica si se ha enviado un controlador en la URL y si existe en la aplicación.
    if(!isset($_GET['controller'])){
        header("Location:".url."?controller=Articulo");
    }else{
        $nombre_controlador = $_GET['controller'].'Controller';
        
        //Se verifica si existe el controladorde la aplicación.
        if(class_exists($nombre_controlador)){

            
            $controller = new $nombre_controlador();

            if(isset($_GET['action']) &&  method_exists($controller, $_GET['action']) ){
                $action = $_GET['action'];
            }else{
                $action = action_default;
            }

            $controller->$action();
            
            //echo action_default . "...";
            
        }else{
            header("Location:".url."?controller=Articulo");
        }
    }

?>

