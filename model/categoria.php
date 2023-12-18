<?php

class Categoria{
    
    private $idCategorias;
    private $nombreCategoria;
    private $descripcion;

    public function __construct(){

    }



    /**
     * Get the value of idCategorias
     */ 
    public function getIdCategorias()
    {
        return $this->idCategorias;
    }

    /**
     * Set the value of idCategorias
     *
     * @return  self
     */ 
    public function setIdCategorias($idCategorias)
    {
        $this->idCategorias = $idCategorias;

        return $this;
    }

    /**
     * Get the value of nombreCategoria
     */ 
    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    /**
     * Set the value of nombreCategoria
     *
     * @return  self
     */ 
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;

        return $this;
    }

    public function getDescripcion(){

        return $this->descripcion;
    
    }

    public function setDescripcion($descripcion){

        $this->descripcion = $descripcion;
    
        return $this;
    
    }
}