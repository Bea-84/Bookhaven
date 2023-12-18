<?php

include_once 'model/ArticuloDAO.php';
include_once 'model/UsuarioDAO.php';
include_once 'model/CategoriaDAO.php';

class DashboardController{

    //funciones para ver productos,usuarios,categorias

    public function list(){
        $listaarticulos = ArticuloDAO::getAllArticulos();
        
        $views = 'views/login/verProductos.php';
        include_once 'views/login/dashboard.php';
    }

    public function listUsuarios(){
        $listaUsuarios = UsuarioDAO::getAllUsuarios();
        
        $views = 'views/login/verUsuarios.php';
        include_once 'views/login/dashboard.php';
    }

    public function listCategorias(){
        $listacategorias = CategoriaDAO::getAllCategories();
        
        $views = 'views/login/verCategoria.php';
        include_once 'views/login/dashboard.php';
    
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------

    //funciones para agregar productos,usuarios,categorias

    public function addproducto(){

        $listacategorias = CategoriaDAO::getAllCategories();

        $views = 'views/login/addProducto.php';
        include_once 'views/login/dashboard.php';
    
    }

    public function addcategoria(){
        $views = 'views/login/addCategoria.php';
        include_once 'views/login/dashboard.php';
    }

    public function addusuario(){
        $views = 'views/login/addUsuario.php';
        include_once 'views/login/dashboard.php';
    
    }


    //-------------------------------------------------------------------------------------------------------------------------------------------------------

    //funciones para editar productos,usuarios,categorias

    public function editarProducto(){
        $listacategorias = CategoriaDAO::getAllCategories();
        
        $producto = ArticuloDAO::getArticuloById($_GET['id']);
        
        $views = 'views/login/editarProducto.php';
        include_once 'views/login/dashboard.php';
    }

   public function editCat(){

         $categoria = categoriaDao::getCatById($_GET['id']);
         //tengo que ir a categoria controller y categoria dao 
         //para hacer funciones y conseguir la categoria

   }
   

}