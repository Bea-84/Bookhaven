<?php

include_once 'model/ArticuloDAO.php';

class ArticuloController{

    //función para ver todos los productos 
    public function list(){
        $listacategorias = CategoriaDAO::getAllCategories();

        $listaarticulos = ArticuloDAO::getAllArticulos();
        include_once 'views/articulos/listado.php';
    }
    
    //Función para ver un producto por su Id
    public function listProductoxId(){

        $listacategorias = CategoriaDAO::getAllCategories();

        $id=$_GET['id'];
        $articulo = ArticuloDAO::getArticuloById($id);
        include_once 'views/articulos/verUnProducto.php';
        
    }

    //función para ver los productos de una categoría por su id
    public function listProductosxIdCat(){

       $listacategorias = CategoriaDAO::getAllCategories();

       $id=$_GET['id'];
       $listaarticulos = ArticuloDao::listProductosxId($id);
       include_once 'views/articulos/listado.php';
    }

    //Función para añadir un producto
    public function add(){
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $idCategoria = $_POST['idCategoria'];

        ArticuloDAO::add($nombre, $precio, $descripcion ,$idCategoria);

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
        $idCategoria = $_POST['idCategoria'];
       
        ArticuloDAO::edit($id,$nombre, $precio, $descripcion ,$idCategoria);

        header("Location:".url."?controller=Dashboard&action=verProductos");
    }

 

   

}