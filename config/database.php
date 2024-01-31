<?php
error_reporting(0);
class DataBase{
    
    //Método para conexión servidor local 
    public static function connect($host='localhost', $user='root', $pwd='ilerna1234', $db='Bookhaven'){
      
        $con = new mysqli($host, $user, $pwd, $db);
       
        if($con == false){
            die('Error en la base de datos');
        }else{
            return $con;
        }


    }
    

    /*Método para conexión desde servidor infinity
    public static function connect($host='sql311.infinityfree.com', $user='if0_35796583', $pwd='aGsOmJOCh6', $db='if0_35796583_Bookhaven'){
        echo" <br>db error"
      try{
        $con = new mysqli($host, $user, $pwd, $db);
      }
        catch(mysqli_sql_exception $e){
            echo $e; echo" <br>db error";
        }
       
        if($con == false){
            die('Error en la base de datos');
        }else{
            return $con;
        }


    }
    */
    

}