<?php

class Pedido{

    private $idPedidos;
    private $precio_total;
    private $fecha_compra;
    private $idUsuario;

    public function __construct(){

    }

    public function getidPedidos(){
        return $this->idPedidos;
    }

    public function setidPedidos($idPedidos){
        $this->idPedidos = $idPedidos;
        return $this;
    }

    public function getprecio_total(){
        return $this->precio_total;
    }

    public function setprecio_total($precio_total){
        $this->precio_total = $precio_total;
        return $this;
    }

    public function getfecha_compra(){
        return $this->fecha_compra;
    }

    public function setfecha_compra($fecha_compra){
        $this->fecha_compra = $fecha_compra;
        return $this;
    }

    public function getidUsuario(){
        return $this->idUsuario;
    }

    public function setidusuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }

    
}