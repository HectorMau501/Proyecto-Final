<?php

//Estas son las variables para conectar a tu base de datos
class DataBase{
    
    private $hostname="localhost";
    private $database= "VentaAutomoviles";
    private $username= "root";
    private $password="";

    
    function conectar(){
            //Aqui se traen las variables para poderlas enviar

                $conexion = "mysqli:host=" . $this->hostname . "; dbbase=" . $this->database;
        
                //Por si tenemos errores en la conexion
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];

                $pdo = new PDO($conexion, $this->username, $this->password, $options);
                return $pdo;

        }    
    }
?>
