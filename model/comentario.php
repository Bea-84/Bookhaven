<?php

class Comentario{

    private $idComentarios;
    private $puntuacion;
    private $fecha;
    private $idUsuario;

    public function __construct(){

    }

    public function getIdComentarios(){
        return $this->idComentarios;
    }
    
    public function setIdComentarios($idComentarios){
        $this->idComentarios = $idComentarios;
        return $this;
    }

    public function getPuntuacion(){
        return $this->puntuacion;
    }

    public function setPuntuacion($puntuacion){
        $this->puntuacion = $puntuacion;
        return $this;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }
    
  
}