<?php

class Articulo
{
    private $idProductos;
    private $nombre;
    private $precio;
    private $descripcion;
    private $idCategoria;
    private $img;
    private $stock;

    public function __construct(){    
    }

    public function getIdProductos()
    {
        return $this->idProductos;
    }

    public function setIdProductos($idProductos)
    {
        $this->$idProductos = $idProductos;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;

        return $this;
    
    }



    public function getImg()
    {
        return $this->img;
    }

  
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($stock){
        $this->stock = $stock;

        return $this;
    
    
    }
}