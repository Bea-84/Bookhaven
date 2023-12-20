<?php

include_once 'model/categoriaDao.php';

class CategoriaController {


    //Función para listar las categorías
    public function listCategorias(){

        $listacategorias = categoriaDAO::getAllCategories();
        include_once 'views/categorias/listadoCat.php';
    }

    //Función para agregar una categoría
    public function add(){
        $nombreCategoria=$_POST['nombreCategoria'];
        $descripcion=$_POST['descripcion'];

        categoriaDao::add($nombreCategoria,$descripcion);

        header("Location:".url."?controller=Dashboard&action=addCategoria");
    }
    
    //Función para eliminar una categoría
    public function delete(){
        $id=$_GET['id'];
        categoriaDao::delete($id);
        header("Location:".url."?controller=Dashboard&action=listCategorias");
    
    }

    //Función para editar un producto
    public function edit(){
        $idCategorias=$_POST['id'];
        $nombreCategoria = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
     
        categoriaDao:: edit($idCategorias,$nombreCategoria,$descripcion);
        
        header("Location:".url."?controller=Dashboard&action=listCategorias");
    }

    
}