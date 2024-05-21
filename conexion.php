<?php
class conexion{
    public static function conectar(){
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "rave-tech"; 

    $conection = new mysqli($servername, $username, $password, $database);
    
    if ($conection->connect_error) {
        die("Conexión fallida: " . $conection->connect_error);
    }
        return $conection;
    }
}
?>
