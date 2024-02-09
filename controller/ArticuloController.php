<?php

include_once 'model/ArticuloDAO.php';
include_once 'model/CategoriaDAO.php';

class ArticuloController{

    //función para ver todos los productos 
    public function list(){

        //Esta sesion start es solo para que se muestre la campana si existe una variable sesion con una cesta
        session_start();

        $listacategorias = CategoriaDAO::getAllCategories();
        $listaarticulos = ArticuloDAO::getAllArticulos();
        include_once 'views/articulos/listado.php';
    }
    
    //Función para ver un producto por su Id
    public function listProductoxId(){
        //Esta sesion start es solo para que se muestre la campana si existe una variable sesion con una cesta
        session_start();

        $listacategorias = CategoriaDAO::getAllCategories();

        $id=$_GET['id'];
        $articulo = ArticuloDAO::getArticuloById($id);
        include_once 'views/articulos/verUnProducto.php';
        
    }

    //función para ver los productos de una categoría por su id
    public function listProductosxIdCat(){
       //Esta sesion start es solo para que se muestre la campana si existe una variable sesion con una cesta
       session_start();

       $listacategorias = CategoriaDAO::getAllCategories();

       $id=$_GET['id'];
       $listaarticulos = ArticuloDAO::listProductosxId($id);
       include_once 'views/articulos/listado.php';
    }

    //Función para añadir un producto
    public function add(){
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $idCategoria = $_POST['idCategoria'];
        $stock = $_POST['stock'];

        ArticuloDAO::add($nombre, $precio, $descripcion ,$idCategoria,$stock);

        header("Location:".url."?controller=Dashboard&action=addProducto");
   
    }

    //Función para eliminar un producto
    public function delete(){
        $id = $_GET['id'];
        ArticuloDAO::delete($id);
        header("Location:".url."?controller=Dashboard");
    
    }

    //Función editar un producto
    public function edit(){
        $id=$_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $idCategoria = $_POST['idCategoria'];
       
       
        ArticuloDAO::edit($id,$nombre, $precio, $descripcion ,$stock,$idCategoria);

        header("Location:".url."?controller=Dashboard&action=verProductos");
    }

    //Función consulta en la BBDD si hay stock de un producto
    public function consultaStock(){

        //recibo id producto para poder hacer la consulta
        $id=$_POST['id'];
        //consulto con la BBDD el stock del producto con el id recibido
        $articulo=ArticuloDAO::consultaStock($id);
          
    }

    //Función para buscar un producto
    public function search(){
        $listacategorias = CategoriaDAO::getAllCategories();
        //recibo por get la palabra
        $search=$_POST['search'];
        //consulto con la BBDD los productos que coincidan con la palabra
        $listaarticulos = ArticuloDAO::search($search);
        //muestro la vista con los productos
        //echo var_dump($listaarticulos);
        include_once 'views/articulos/resultadoBuscador.php';
    }
    
    
}
