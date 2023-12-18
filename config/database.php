<?php

class DataBase{
    
    public static function connect($host='localhost', $user='root', $pwd='ilerna1234', $db='Bookhaven'){
      
        $con = new mysqli($host, $user, $pwd, $db);
       
        if($con == false){
            die('Error en la base de datos');
        }else{
            return $con;
        }
    }
}