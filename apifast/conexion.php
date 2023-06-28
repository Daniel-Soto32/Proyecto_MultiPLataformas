<?php

class Conexion {

    public function getConexion(){
     try {
          $host = "localhost";   //localhost
          $db = "_danonino";        //_Danonino
          $user = "root";        //equipo02 
          $password = "";        //Desapp.1235
          $db = new PDO("mysql:host=$host;dbname=$db;",$user, $password);
          // if($db){
            // echo "CONECTO CON ÉXITO<br><br>";
          // }
          return $db;
           
         }catch(PDOException $e){
           
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            die(); 
         }
       
  }

}
?>
